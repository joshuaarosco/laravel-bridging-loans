<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\ILoanTypeRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\Backoffice\LoanType as Model;
use DB, Str;

class LoanTypeRepository extends Model implements ILoanTypeRepository
{

    public function fetch(){
        return $this->all();
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $data = $this->find($request->id)?:new self;
            $data->title = $request->title;
            $data->interest = $request->interest;
            $data->rate = $request->rate;
            
            $data->save();

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
}
