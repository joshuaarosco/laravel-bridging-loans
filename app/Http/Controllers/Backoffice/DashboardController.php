<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Domain\Interfaces\Repositories\Backoffice\ILoanRepository;
use App\Domain\Interfaces\Repositories\Backoffice\ILoanTypeRepository;

class DashboardController extends Controller
{
    public function __construct(ILoanTypeRepository $loanTyperepo, ILoanRepository $loanRepo){
        $this->data = [];
        $this->loanRepo = $loanRepo;
        $this->loanTyperepo = $loanTyperepo;
        $this->data['loanTypes'] = $this->loanTyperepo->fetch();
        $this->data['loans'] = $this->loanRepo->fetchDashLoans();
    }
    //Do some magic
    public function index(){
        if(auth()->user()->type == 'member' AND auth()->user()->member->active != 1){
            auth()->logout();
            session()->flash('notification-status', "warning");
            session()->flash('notification-msg', "Your Membership is not Activated/Approved yet. Please wait for the Admin to Activate your Membership.");
            return redirect()->route('backoffice.auth.login');
        }
        $this->data['shareCapital'] = 0;
        if(auth()->user()->type == 'member'){
            $this->data['shareCapital'] = auth()->user()->shareCapital->share_capital;
            $this->data['loansPaid'] = $this->data['loans']->where('loan_status', 'completed')->where('user_id', auth()->user()->id)->sum('oath_5');
            $this->data['loanBalance'] = $this->data['loans']->where('loan_status', 'approved')->where('user_id', auth()->user()->id)->sum('oath_5');
        }else{
            $this->data['loansPaid'] = $this->data['loans']->where('loan_status', 'completed')->sum('oath_5');
            $this->data['loanBalance'] = $this->data['loans']->where('loan_status', 'approved')->sum('oath_5');
        }

        $this->data['nextDueDate'] = null;
        if($this->data['loanBalance'] > 0){
            $time = strtotime("2010.12.11");
            $this->data['nextDueDate'] = date("M Y", strtotime("+1 month"));
        }
    	return view('backoffice.index', $this->data);
    }
}
