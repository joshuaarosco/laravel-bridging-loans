<?php

namespace App\Repositories\Backoffice;
use App\Domain\Interfaces\Repositories\Backoffice\IRegisterRepository;

use App\Logic\ImageUploader as UploadLogic;
use App\Models\User as Model;
use App\Models\Backoffice\Member;
use DB, Str;

class RegisterRepository extends Model implements IRegisterRepository
{

    public function fetch($id){
        return $this->find($id);
    }

    public function saveData($request){
        DB::beginTransaction();
        try {
            $user = new self;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->lname = $request->lname;
            $user->username = $request->email;
            $user->type = 'member';
            $user->email = $request->email;
            $user->contact_number = $request->contact_number;
            $user->password = bcrypt($request->password);

            $user->save();

            $data = new Member;

            $data->user_id = $user->id;

            if($request->hasFile('bc')){
                $upload = UploadLogic::upload($request->bc,'storage/bc');
                $data->bc_path = $upload["path"];
                $data->bc_directory = $upload["directory"];
                $data->bc_filename = $upload["filename"];
            }

            if($request->hasFile('coe')){
                $upload = UploadLogic::upload($request->coe,'storage/coe');
                $data->coe_path = $upload["path"];
                $data->coe_directory = $upload["directory"];
                $data->coe_filename = $upload["filename"];
            }

            if($request->hasFile('lp')){
                $upload = UploadLogic::upload($request->lp,'storage/lp');
                $data->lp_path = $upload["path"];
                $data->lp_directory = $upload["directory"];
                $data->lp_filename = $upload["filename"];
            }

            if($request->hasFile('id')){
                $upload = UploadLogic::upload($request->id,'storage/id');
                $data->id_path = $upload["path"];
                $data->id_directory = $upload["directory"];
                $data->id_filename = $upload["filename"];
            }

            if($request->hasFile('fee')){
                $upload = UploadLogic::upload($request->fee,'storage/fee');
                $data->fee_path = $upload["path"];
                $data->fee_directory = $upload["directory"];
                $data->fee_filename = $upload["filename"];
            }

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
}
