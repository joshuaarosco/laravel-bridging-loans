<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logic\GeneralLogic as Logic;
use App\Models\User;
use Auth;

//Events
use App\Events\SendEmailEvent;

//Services & Repositories
use App\Domain\Interfaces\Services\Backoffice\ICRUDService;
use App\Domain\Interfaces\Repositories\Backoffice\IRegisterRepository;

//Requests
use App\Http\Requests\Backoffice\RegisterRequest;

class RegisterController extends Controller
{
    //do some magic
    public function __construct(Logic $logic, IRegisterRepository $repo, ICRUDService $CRUDservice) {
        $this->repo = $repo;
        $this->logic = $logic;
        $this->CRUDservice = $CRUDservice;
		$this->middleware('backoffice.guest', ['except' => "logout"]);
	}

	public function signUp() {
		return view('backoffice.auth.register');
	}

	public function register(RegisterRequest $request) {
		$data = $this->CRUDservice->save($request, $this->repo);
        if($data){
            Auth::loginUsingId($data->user_id);
            return redirect()->route('backoffice.index');
        }
        return redirect()->back();
	}
}
