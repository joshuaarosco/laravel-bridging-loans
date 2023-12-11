<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Events
use App\Events\SendEmailEvent;

//Services & Repositories
use App\Domain\Interfaces\Services\Backoffice\ICRUDService;
use App\Domain\Interfaces\Repositories\Backoffice\IUserRepository;
use App\Domain\Interfaces\Repositories\Backoffice\ILoanTypeRepository;

//Request Validator
use App\Http\Requests\Backoffice\UserRequest;
use App\Http\Requests\Backoffice\MemberRequest;

//Global Classes
use Input;

class UserController extends Controller
{
    //Do some magic
    public function __construct(IUserRepository $repo, ICRUDService $CRUDservice, ILoanTypeRepository $loanTypeRepo){
        $this->data = [];
        $this->repo = $repo;
        $this->CRUDservice = $CRUDservice;
        $this->data['title'] = 'User';
        $this->data['user_types'] = __('user_type');
        $this->loanTypeRepo = $loanTypeRepo;
        $this->data['loanTypes'] = $this->loanTypeRepo->fetch();
    }

    public function index(){
        $this->data['users'] = $this->repo->fetch();
        return view('backoffice.pages.user.index',$this->data);
    }

    public function create(UserRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        event(new SendEmailEvent($crudData,'new_user'));
        return redirect()->back();
    }

    public function view($id){
        $this->data['event'] = $this->repo->findOrFail($id);
        if(!$this->data['event']){
            return abort(404);
        }
        return view('backoffice.pages.user.view', $this->data);
    }

    public function edit(){
        $data['datas'] = $this->repo->findOrFail(Input::get('_id'));
        return response()->json($data,200);
    }

    public function update(Request $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->back();
    }

    public function delete($id){
        return $this->CRUDservice->delete($id, $this->repo);
    }

    public function member(){
        $this->data['title'] = 'Member';
        $this->data['members'] = $this->repo->fetchMembers();
        return view('backoffice.pages.user.member',$this->data);
    }

    public function createMember(MemberRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        event(new SendEmailEvent($crudData,'new_user'));
        return redirect()->back();
    }

    public function editMember(){
        $data['datas'] = $this->repo->findOrFailMember(Input::get('_id'));
        return response()->json($data,200);
    }

    public function updateMember(Request $request){
        $member = $this->repo->saveMember($request);
        if(!$member){
            session()->flash('notification-status', "danger");
            session()->flash('notification-msg', __('msg.error'));
        }
        session()->flash('notification-status', "success");
        session()->flash('notification-msg', __('msg.save_success'));
        return redirect()->back();
    }

}
