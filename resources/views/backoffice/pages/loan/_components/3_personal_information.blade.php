<div class="row">
    <div class="col-sm-12">
        <address class="m-t-20 fw-500 text-underline">
        Personal Information
        </address>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
        <address>
        Applicant: <input class="loan-input loan-justified pull-right" name="applicant" type="text" value="{{$loan?$loan->applicant:auth()->user()->fname.' '.auth()->user()->lname}}" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Address: <input class="loan-input loan-justified pull-right" name="address" value="{{$loan?$loan->address:old('address')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Date Employed: <input class="loan-input loan-justified pull-right" name="date_employed" value="{{$loan?$loan->date_employed:old('date_employed')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Position: <input class="loan-input loan-justified pull-right" name="position" value="{{$loan?$loan->position:old('position')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Spouse: <input class="loan-input loan-justified pull-right" name="spouse" value="{{$loan?$loan->spouse:old('spouse')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        </address>
    </div>
    <div class="col-sm-6">
        <address>
        Birthday: <input class="loan-input w-60" name="birthdate" value="{{$loan?$loan->birthdate:old('birthdate')}}" type="date" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>(mm/dd/yy) Age:<input class="loan-input w-15" name="age" value="{{$loan?$loan->age:old('age')}}" type="number" step="any" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Employer: <input class="loan-input w-88 pull-right" name="employer" value="{{$loan?$loan->employer:old('employer')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Monthly Salary: <input class="loan-input w-83 pull-right" name="monthly_salary" value="{{$loan?$loan->monthly_salary:old('monthly_salary')}}" type="number" step="any" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        Employment Status: <input class="loan-input w-78 pull-right" name="employment_status" value="{{$loan?$loan->employment_status:old('employment_status')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
        No. of dependents: <input class="loan-input w-20" name="no_of_dependents" value="{{$loan?$loan->no_of_dependents:old('no_of_dependents')}}" type="number" step="any" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> 
        <input class="loan-input w-50 pull-right" name="contact_number" type="text" value="{{$loan?$loan->contact_number:auth()->user()->contact_number}}" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><span class="pull-right">Contact #:</span> 
        </address>
    </div>
</div>