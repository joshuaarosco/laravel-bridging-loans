<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logic\GeneralLogic as Logic;
use App\Models\User;
use Auth, Input;

//Events
use App\Events\SendEmailEvent;

//Services & Repositories
use App\Domain\Interfaces\Services\Backoffice\ICRUDService;
use App\Domain\Interfaces\Repositories\Backoffice\IProductRepository;
use App\Domain\Interfaces\Repositories\Backoffice\ILoanTypeRepository;

//Requests
use App\Http\Requests\Backoffice\ProductRequest;

class ProductController extends Controller
{
    //do some magic
    public function __construct(Logic $logic, IProductRepository $repo, ILoanTypeRepository $loanType, ICRUDService $CRUDservice, ILoanTypeRepository $loanTypeRepo) {
        $this->repo = $repo;
        $this->logic = $logic;
        $this->loanType = $loanType;
        $this->CRUDservice = $CRUDservice;
        $this->data = [];
        $this->data['title'] = 'Product';
        $this->data['loanTypes'] = $this->loanType->fetch();
	}

	public function index() {
        $this->data['products'] = $this->repo->fetch();
		return view('backoffice.pages.product.index', $this->data);
	}

    public function grid(){
        $this->data['products'] = $this->repo->fetch();
		return view('backoffice.pages.product.grid', $this->data);
    }

    public function edit(){
        $data['datas'] = $this->repo->findOrFail(Input::get('_id'));
        return response()->json($data,200);
    }

    public function update(Request $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->back();
    }

    public function create(ProductRequest $request){
        $crudData = $this->CRUDservice->save($request, $this->repo);
        return redirect()->back();
    }

    public function delete($id){
        return $this->CRUDservice->delete($id, $this->repo);
    }
}
