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
use App\Domain\Interfaces\Repositories\Backoffice\ILoanRepository;
use App\Domain\Interfaces\Repositories\Backoffice\IUserRepository;
use App\Domain\Interfaces\Repositories\Backoffice\IRegisterRepository;
use App\Domain\Interfaces\Repositories\Backoffice\ILoanTypeRepository;

//Requests
use App\Http\Requests\Backoffice\LoanRequest;

class LoanApplicationController extends Controller
{
    //do some magic
    public function __construct(Logic $logic, ICRUDService $CRUDservice, IUserRepository $userRepo, ILoanRepository $repo, ILoanTypeRepository $loanTypeRepo) {
        $this->logic = $logic;
        $this->CRUDservice = $CRUDservice;
        $this->loanTypeRepo = $loanTypeRepo;
        $this->userRepo = $userRepo;
        $this->data['loanTypes'] = $this->loanTypeRepo->fetch();
        $this->data['title'] = 'Loan Application';
        $this->data['loan_statuses'] = [
            'new' => 'New Loan Application',
            'pending' => 'Awaiting Credit Committee Approval',
            'awaiting_disclosure_statement_approval' => 'Awaiting for Disclosure Statement Approval',
            'awaiting_chair_gm' => 'Awaiting Chair/General Manager Approval', 
            'approved' => 'Approved/Outstanding',
            'rejected' => 'Rejected',
            'completed' => 'Loan Complete'];

        $this->repo = $repo;
	}

	public function index() {
        $this->data['coBorrowers'] = $this->userRepo->coBorrowers(auth()->user()->id);
        if($this->repo->fetch(auth()->user()->id)){
            session()->flash('notification-status', "info");
            session()->flash('notification-msg', "You currently have an existing Loan Application.");
            return redirect()->route('backoffice.profile.loan.current');
        }
        $this->data['pb_no'] = $this->repo->generatePBNo();
        $this->data['loan'] = null;
		return view('backoffice.pages.loan.new_application', $this->data);
	}

    public function create(LoanRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->route('backoffice.profile.loan.current');
    }

    public function current(){
        $this->data['loan'] = $this->repo->fetch(auth()->user()->id);
        if(!$this->data['loan']){
            session()->flash('notification-status', "info");
            session()->flash('notification-msg', "You don't have a current Loan Application.");
            return redirect()->route('backoffice.profile.loan.application');
        }
        if(auth()->user()->type == 'member'){
            return view('backoffice.pages.loan.new_application', $this->data);
        }else{
            return view('backoffice.pages.loan.application', $this->data);
        }
    }

    public function updateCurrent(Request $request){
        $this->data['loan'] = $this->repo->fetch(auth()->user()->id);
        if(!$this->data['loan']){
            session()->flash('notification-status', "info");
            session()->flash('notification-msg', "You don't have a current Loan Application.");
            return redirect()->route('backoffice.profile.loan.application');
        }
        $this->data['loan'] = $this->CRUDservice->save($request, $this->repo);
        return redirect()->back();
    }

    public function list(){
        $this->data['loans'] = $this->repo->fetchAll();
        return view('backoffice.pages.loan.index', $this->data);
    }

    public function view($id){
        $this->data['loan'] = $this->repo->findOrFail($id);
        if(!$this->data['loan']){
            return redirect()->route('backoffice.loan.list');
        }
        return view('backoffice.pages.loan.application', $this->data);
    }

    public function update(Request $request, $id){
        $this->data['loan'] = $this->CRUDservice->save($request, $this->repo);
        return redirect()->back();
    }

    public function history(){
        $this->data['loans'] = $this->repo->fetchHistory();
        return view('backoffice.pages.loan.history', $this->data);
    }

    public function report(Request $request){
        $this->data['title'] = 'Loan Report';
        $this->data['loans'] = $this->repo->fetchWithFilter($request);
        return view('backoffice.pages.loan.report', $this->data);
    }
}
