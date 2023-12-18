<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\ILoanRepository;

use App\Events\SendEmailEvent;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\Backoffice\Loan as Model;
use App\Models\Backoffice\ShareCapital;
use DB, Str, Collection;

class LoanRepository extends Model implements ILoanRepository
{
    public $share_capital = 0.05;
    public function fetch($id){
        return $this->where('user_id', $id)->whereNotIn('loan_status', ['completed', 'cancelled'])->first();
    }

    public function fetchAll(){
        return $this->orderBy('updated_at', 'DESC')->get();
    }

    public function fetchCurrentLoans(){
        return $this->whereIn('loan_status',['pending','approved'])->orderBy('updated_at', 'DESC')->get();
    }

    public function fetchWithFilter($request){
        $query = self::query();
        if($request->has('status') AND $request->status != ''){
            $query->where('loan_status', $request->status);
        }
        if($request->has('start') AND $request->start != ''){
            $start = date("Y-m-01", strtotime($request->get('start')));
            $query->where('created_at','>=', $start);
        }
        if($request->has('end') AND $request->end != ''){
            $end = date("Y-m-01", strtotime($request->get('end')));
            $query->where('created_at','<=', $end);
        }
        return $query->orderBy('created_at', 'ASC')->get();
    }

    public function fetchDashLoans(){
        return $this;
    }

    public function fetchHistory(){
        return $this->orderBy('updated_at', 'DESC')
                    ->whereIn('loan_status',['completed','cancelled'])
                    ->where('user_id', auth()->user()->id)
                    ->get();
    }

    public function generatePBNo(){
        $userId = auth()->user()->id;
        $count = $this->where('user_id', $userId)->count()+1;
        $num = sprintf("%04d", $count);
        $id = sprintf("%03d", $userId);
        return date('Y').$id.$num;
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id)?:new self;
            
            if(!$request->has('id')){ 
                $data->user_id = auth()->user()->id;
                $data->loan_status = 'pending';
                $data->co1_status = 'pending';
                $data->co2_status = 'pending';
            }else{
                
            }

            if($request->submit == 'Approve'){
                if($data->loan_status == 'awaiting_chair_gm'){
                    // Notification loan approved
                    event(new SendEmailEvent($data,'loan_approved'));
                    $data->loan_status = 'approved';
                }else if($data->loan_status == 'awaiting_disclosure_statement_approval'){
                    $data->footer_signed = $data->cert_signed;
                    $data->footer_date = date('Y-m-d');
                    $data->loan_status = 'awaiting_chair_gm'; 
                }else{
                    // $data->loan_status = 'awaiting_disclosure_statement_approval';
                    $shareCapital = ShareCapital::where('user_id', $data->user_id)->first();
                    
                    $shareCapital->share_capital += ($data->oath_1 * $this->share_capital);
                    $shareCapital->save();

                    event(new SendEmailEvent($data,'loan_approved'));
                    $data->loan_status = 'approved';
                }

            }else if($request->submit == 'Reject'){
                // Notification loan rejection
                event(new SendEmailEvent($data,'loan_rejected'));
                $data->loan_status = 'rejected';
            }else if($request->submit == 'Complete'){
                // Notification loan completed
                event(new SendEmailEvent($data,'loan_completed'));
                $data->loan_status = 'completed';
            }else if($request->submit == 'Co-Borrower 1 Approve'){
                $data->co1_status = 'approve';
            }else if($request->submit == 'Co-Borrower 2 Approve'){
                $data->co2_status = 'approve';
            }else if($request->submit == 'Co-Borrower 1 Reject'){
                $data->co1_status = 'reject';
            }else if($request->submit == 'Co-Borrower 2 Reject'){
                $data->co2_status = 'reject';
            }
            
            $data->pb_no = $request->pb_no;
            $data->oath_1 = $request->oath_1;
            $data->oath_2 = $request->oath_2;
            $data->oath_3 = $request->oath_3;
            $data->oath_4 = $request->oath_4;
            $data->oath_5 = $request->oath_5;
            $data->oath_6 = $request->oath_6;
            $data->oath_7 = $request->oath_7;

            $data->purpose = $request->purpose;
            $data->collateral = $request->collateral;
            $data->type_id = $request->type_id;

            $data->applicant = $request->applicant;
            $data->address = $request->address;
            $data->date_employed = $request->date_employed;
            $data->position = $request->position;
            $data->spouse = $request->spouse;
            $data->birthdate = $request->birthdate;
            $data->age = $request->age;
            $data->employer = $request->employer;
            $data->monthly_salary = $request->monthly_salary;
            $data->employment_status = $request->employment_status;
            $data->no_of_dependents = $request->no_of_dependents;
            $data->contact_number = $request->contact_number;

            $data->co1_name = $request->co1_name;
            $data->co1_id = $request->co1_id;
            $data->co1_address = $request->co1_address;
            $data->co1_date_employed = $request->co1_date_employed;
            $data->co1_position = $request->co1_position;

            $data->co2_id = $request->co2_id;
            $data->co2_name = $request->co2_name;
            $data->co2_address = $request->co2_address;
            $data->co2_date_employed = $request->co2_date_employed;
            $data->co2_position = $request->co2_position;

            $data->co1_contact_number = $request->co1_contact_number;
            $data->co1_employer = $request->co1_employer;
            $data->co1_monthly_salary = $request->co1_monthly_salary;
            $data->co1_employment_status = $request->co1_employment_status;
            $data->co2_contact_number = $request->co2_contact_number;
            $data->co2_employer = $request->co2_employer;
            $data->co2_monthly_salary = $request->co2_monthly_salary;
            $data->co2_employment_status = $request->co2_employment_status;

            $data->cert_application_date = $request->cert_application_date;
            if($request->has('cert_signed')){
                $data->cert_signed = $request->cert_signed != null? $this->uploadSign($request->cert_signed):null;
            }
            $data->cert_address = $request->cert_address;

            $data->evaluated_by = $request->evaluated_by;
            $data->meeting_1 = $request->meeting_1;
            $data->meeting_2 = $request->meeting_2;
            $data->meeting_3 = $request->meeting_3;
            $data->meeting_4 = $request->meeting_4;
            $data->meeting_5 = $request->meeting_5;
            
            if($request->has('chair')){
                $data->chair = $request->chair != null? $this->uploadSign($request->chair):null;
            }
            $data->chair_name = $request->chair_name;

            if($request->has('member_1')){
                $data->member_1 = $request->member_1 != null? $this->uploadSign($request->member_1):null;
            }
            $data->member_1_name = $request->member_1_name;

            if($request->has('member_2')){
                $data->member_2 = $request->member_2 != null? $this->uploadSign($request->member_2):null;
            }
            $data->member_2_name = $request->member_2_name;

            if($request->has('cob')){
                $data->cob = $request->cob != null? $this->uploadSign($request->cob):null;
            }
            $data->cob_name = $request->cob_name;
            
            if($request->has('gm')){
                $data->gm = $request->gm != null? $this->uploadSign($request->gm):null;
            }
            $data->gm_name = $request->gm_name;

            if($request->has('ao')){
                $data->ao = $request->ao != null? $this->uploadSign($request->ao):null;
            }
            $data->ao_name = $request->ao_name;

            if($request->has('cc')){
                $data->cc = $request->cc != null? $this->uploadSign($request->cc):null;
            }
            $data->cc_name = $request->cc_name;

            $data->loan_granted = $request->loan_granted;
            $data->less_charges = $request->less_charges;
            $data->processing = $request->processing;
            $data->oc0_val = $request->oc0_val;
            $data->total_0 = $request->total_0;
            $data->notarial_fee = $request->notarial_fee;
            $data->oc1_title = $request->oc1_title;
            $data->oc1_val = $request->oc1_val;
            $data->total_1 = $request->total_1;
            $data->prev_loan_bal = $request->prev_loan_bal;
            $data->oc2_title = $request->oc2_title;
            $data->oc2_val = $request->oc2_val;
            $data->total_2 = $request->total_2;
            $data->interest = $request->interest;
            $data->oc3_title = $request->oc3_title;
            $data->oc3_val = $request->oc3_val;
            $data->total_3 = $request->total_3;
            $data->share_capital = $request->share_capital;
            $data->oc4_title = $request->oc4_title;
            $data->oc4_val = $request->oc4_val;
            $data->total_4 = $request->total_4;
            $data->first_installment = $request->first_installment;
            $data->oc5_title = $request->oc5_title;
            $data->oc5_val = $request->oc5_val;
            $data->total_5 = $request->total_5;
            $data->insurance = $request->insurance;
            $data->oc6_title = $request->oc6_title;
            $data->oc6_val = $request->oc6_val;
            $data->total_6 = $request->total_6;
            $data->insurance_refund = $request->insurance_refund;
            $data->oc7_title = $request->oc7_title;
            $data->oc7_val = $request->oc7_val;
            $data->total_7 = $request->total_7;
            $data->fine_penalty = $request->fine_penalty;
            $data->total_charges = $request->total_charges;
            $data->total_charges_final = $request->total_charges_final;
            $data->net_proceeds = $request->net_proceeds;

            $data->note_1 = $request->note_1;
            $data->note_2 = $request->note_2;

            // if($request->has('footer_signed')){
            //     $data->footer_signed = $request->footer_signed != null? $this->uploadSign($request->footer_signed):null;
            // }
            // $data->footer_date = $request->footer_date;
            
            $data->cdv_no = $request->cdv_no;
            $data->cdv_date = $request->cdv_date;
            $data->cc_no = $request->cc_no;
            $data->cc_date = $request->cc_no;
            
            $data->save();

            if($data->co1_status == 'pending' || $data->co2_status == 'pending'){
                event(new SendEmailEvent($data,'coborrower_notif'));
            }

            DB::commit();

            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function findOrFail($id){
        $data = $this->find($id);
        if(!$data){
            return false;
        }
        return $data;
    }

    public function deleteData($id){
        DB::beginTransaction();
        try {
            $this->destroy($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function uploadSign($sign){
        $folderPath = public_path('storage/signatures/');
        
        $image = explode(";base64,", $sign);
              
        $image_type = explode("image/", $image[0]);
           
        $image_type_png = $image_type[1];
           
        $image_base64 = base64_decode($image[1]);

        $id = uniqid();
           
        $file = $folderPath.$id.'.'.$image_type_png;
        file_put_contents($file, $image_base64);

        return "storage/signatures/".$id.".".$image_type_png;
    }

    public function cancel($id){
        $loan = self::find($id);
        $loan->loan_status = 'cancelled';
        $loan->save();
    }

    public function approve($id){
        $loan = self::find($id);
        $loan->loan_status = 'approved';
        $shareCapital = ShareCapital::where('user_id', $loan->user_id)->first();
        $shareCapital->share_capital += ($loan->oath_1 * $this->share_capital);
        $shareCapital->save();

        event(new SendEmailEvent($loan,'loan_approved'));
        $loan->save();
    }

    public function fetchLoansWaitingForMyApproval(){
        return self::where('loan_status', 'pending')
                    ->where('co1_id', auth()->user()->id)
                    ->orWhere('co2_id', auth()->user()->id)
                    ->get();
    }
}
