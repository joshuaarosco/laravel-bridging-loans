
<div class="row">
    <div class="col-sm-12">
        <address class="m-t-20 fw-500 text-underline">
        Co-Borrower's Information
        </address>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <address class="pl-20">
        (1) Name: <input class="loan-input w-75 pull-right" name="co1_name" value="{{$loan?$loan->co1_name:old('co1_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        <span class="ml-22">Address:</span> <input class="loan-input w-75 pull-right" name="co1_address" value="{{$loan?$loan->co1_address:old('co1_address')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        <span class="ml-22">Date Employed:</span> <input class="loan-input w-75 pull-right" name="co1_date_employed" value="{{$loan?$loan->co1_date_employed:old('co1_date_employed')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        <span class="ml-22">Position:</span> <input class="loan-input w-75 pull-right" name="co1_position" value="{{$loan?$loan->co1_position:old('co1_position')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        (2) Name: <input class="loan-input w-75 pull-right" name="co2_name" value="{{$loan?$loan->co2_name:old('co2_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        <span class="ml-22">Address:</span> <input class="loan-input w-75 pull-right" name="co2_address" value="{{$loan?$loan->co2_address:old('co2_address')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        <span class="ml-22">Date Employed:</span> <input class="loan-input w-75 pull-right" name="co2_date_employed" value="{{$loan?$loan->co2_date_employed:old('co2_date_employed')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        <span class="ml-22">Position:</span> <input class="loan-input w-75 pull-right" name="co2_position" value="{{$loan?$loan->co2_position:old('co2_position')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        </address>
    </div>
    <div class="col-sm-6">
        <address>
        Contact #: <input class="loan-input w-75 pull-right" name="co1_contact_number" value="{{$loan?$loan->co1_contact_number:old('co1_contact_number')}}" type="tel" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Employer: <input class="loan-input w-75 pull-right" name="co1_employer" value="{{$loan?$loan->co1_employer:old('co1_employer')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Monthly Salary: <input class="loan-input w-75 pull-right" name="co1_monthly_salary" value="{{$loan?$loan->co1_monthly_salary:old('co1_monthly_salary')}}" type="number" step="any" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Employment Status: <input class="loan-input w-75 pull-right" name="co1_employment_status" value="{{$loan?$loan->co1_employment_status:old('co1_employment_status')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Contact #: <input class="loan-input w-75 pull-right" name="co2_contact_number" value="{{$loan?$loan->co2_contact_number:old('co2_contact_number')}}" type="tel" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Employer: <input class="loan-input w-75 pull-right" name="co2_employer" value="{{$loan?$loan->co2_employer:old('co2_employer')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Monthly Salary: <input class="loan-input w-75 pull-right" name="co2_monthly_salary" value="{{$loan?$loan->co2_monthly_salary:old('co2_monthly_salary')}}" type="number" step="any" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Employment Status: <input class="loan-input w-75 pull-right" name="co2_employment_status" value="{{$loan?$loan->co2_employment_status:old('co2_employment_status')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        </address>
    </div>
</div>