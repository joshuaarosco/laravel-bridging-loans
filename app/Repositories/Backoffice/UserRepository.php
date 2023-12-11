<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IUserRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\User as Model;
use App\Models\Backoffice\Member;
use App\Models\Backoffice\ShareCapital;
use DB, Str;

class UserRepository extends Model implements IUserRepository
{

    public function fetch(){
        return $this->where('type','!=','super_user')->where('type','!=','member')->get();
    }

    public function fetchMembers(){
        return $this->where('type','!=','super_user')->where('type','=','member')->get();
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id);

            $password = Str::random(8);
            if(!$data){
                $data = new self;
                $data->password = bcrypt($password);
            }

            $data->fname = $request->fname;
            $data->mname = $request->mname;
            $data->lname = $request->lname;
            $data->username = $request->email;
            $data->type = $request->type;
            $data->email = $request->email;
            $data->contact_number = $request->contact_number;
            
            $data->save();

            if($request->type == 'member'){
                $newMember = new Member;

                $newMember->user_id = $data->id;

                $newMember->contact_number = $request->contact_number;
                $newMember->no_of_dependents = $request->no_of_dependents;
                $newMember->employment_status = $request->employment_status;
                $newMember->monthly_salary = $request->monthly_salary;
                $newMember->employer = $request->employer;
                $newMember->age = $request->age;
                $newMember->birthdate = $request->birthdate;
                $newMember->spouse = $request->spouse;
                $newMember->position = $request->position;
                $newMember->date_employed = $request->date_employed;
                $newMember->address = $request->address;

                $newMember->save();
            }

            DB::commit();

            $data->password = $password;
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

    public function findOrFailMember($id){
        $data = $this->find($id);
        if(!$data){
            return false;
        }
        $member = [
            'id' => $data->id,
            'email' => $data->email,
            'fname' => $data->fname,
            'mname' => $data->mname,
            'lname' => $data->lname,
            'active' => $data->member->active,
            'contact_number' => $data->member->contact_number, 
            'no_of_dependents' => $data->member->no_of_dependents, 
            'employment_status' => $data->member->employment_status, 
            'monthly_salary' => $data->member->monthly_salary, 
            'employer' => $data->member->employer, 
            'age' => $data->member->age, 
            'birthdate' => $data->member->birthdate, 
            'spouse' => $data->member->spouse, 
            'position' => $data->member->position, 
            'date_employed' => $data->member->date_employed, 
            'address' => $data->member->address, 
            'coe' => $data->coe(),
            'bc' => $data->bc(),
            'lp' => $data->lp(),
            'id_pic' => $data->id(),
            'fee' => $data->fee(),
        ];
        return $member;
    }

    public function saveMember($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id);
            $member = Member::find($data->member->id);
            $shareCapital = ShareCapital::where('user_id',$data->id)->first()?:null;
            if($request->has('active') AND $request->active == '1'){
                $member->active = true;
            }else{
                $member->active = false;
            }
            $member->save();

            if(!$shareCapital){
                $shareCapital = new ShareCapital();
                $shareCapital->user_id = $data->id;
                $shareCapital->share_capital = 10000;
                $shareCapital->save();
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function coBorrowers($userId){
        $members = self::where('type', 'member')->where('id', '!=', $userId)->get();
        $coBorrwers = [];
        foreach($members as $index => $member){
            if($member->member->active){
                array_push($coBorrwers, ['id' => $member->id, 'name' => $member->lname.", ".$member->fname.' '.$member->mname]);
            }
        }
        return $coBorrwers;
    }
}
