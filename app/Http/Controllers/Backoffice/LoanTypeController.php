<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logic\GeneralLogic as Logic;
use App\Models\User;

//Events
use App\Events\SendEmailEvent;

//Services & Repositories
use App\Domain\Interfaces\Services\Backoffice\ICRUDService;
use App\Domain\Interfaces\Repositories\Backoffice\ILoanTypeRepository;

//Requests
use App\Http\Requests\Backoffice\LoanTypeRequest;

//Global Classes
use Input, Auth;

class LoanTypeController extends Controller
{
    //do some magic
    public function __construct(Logic $logic, ILoanTypeRepository $repo, ICRUDService $CRUDservice) {
        $this->logic = $logic;
        $this->CRUDservice = $CRUDservice;
        $this->repo = $repo;
        $this->data['rates'] = __('rate');
        $this->data['loanTypes'] = $this->repo->fetch();
	}

	public function index() {
        $this->data['title'] = 'Loan Type';
		return view('backoffice.pages.loan_type.index', $this->data);
	}

    public function create(LoanTypeRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->back();
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
}
