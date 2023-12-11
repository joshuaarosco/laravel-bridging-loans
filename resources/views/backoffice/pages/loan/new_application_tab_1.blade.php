<div class="row row-same-height">
    <div class="col-md-12">
        <div class="mb-4 sm-padding-5">
            <h2>Member Personal Information</h2>
        </div>
    </div>
    <div class="col-md-6 b-r b-dashed b-grey sm-b-b">
        <div class="sm-padding-5">
            <!-- <form role="form"> -->
                <!-- <p>Name and Email Address</p> -->
                <div class="form-group-attached">
                    <div class="form-group form-group-default required">
                        <label>Applicant</label>
                        <input type="text" class="form-control" id="applicant" name="applicant" value="{{$loan?$loan->applicant:auth()->user()->fname.' '.auth()->user()->lname}}" {{$loan?"readonly":""}}>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{$loan?$loan->address:old('address')}}" placeholder="Current address" {{$loan?"readonly":""}}>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Date Employed</label>
                        <input type="text" class="form-control" name="date_employed" value="{{$loan?$loan->date_employed:old('date_employed')}}" {{$loan?"readonly":""}}>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Position</label>
                        <input type="text" class="form-control" name="position" value="{{$loan?$loan->position:old('position')}}" {{$loan?"readonly":""}}>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Spouse</label>
                        <input type="text" class="form-control" name="spouse" value="{{$loan?$loan->spouse:old('spouse')}}" {{$loan?"readonly":""}}>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="sm-padding-5">
            <!-- <form role="form"> -->
                <div class="form-group-attached">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Birthday</label>
                                <input type="date" class="form-control" name="birthdate" value="{{$loan?$loan->birthdate:old('birthdate')}}" {{$loan?"readonly":""}}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Age</label>
                                <input type="number" step="any" class="form-control" name="age" value="{{$loan?$loan->age:old('age')}}" {{$loan?"readonly":""}}>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Employer</label>
                        <input type="text" class="form-control" name="employer" value="{{$loan?$loan->employer:old('employer')}}" {{$loan?"readonly":""}}>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Monthly Salary</label>
                        <input type="number" step="any" class="form-control" name="monthly_salary" value="{{$loan?$loan->monthly_salary:old('monthly_salary')}}" {{$loan?"readonly":""}}>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Employment Status</label>
                        <input type="text" class="form-control" name="employment_status" value="{{$loan?$loan->employment_status:old('employment_status')}}" {{$loan?"readonly":""}}>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>No of dependents</label>
                                <input type="number" step="any" class="form-control" name="no_of_dependents" value="{{$loan?$loan->no_of_dependents:old('no_of_dependents')}}" {{$loan?"readonly":""}}>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Contact #</label>
                                <input type="text" class="form-control" name="contact_number" value="{{$loan?$loan->contact_number:old('contact_number')}}" {{$loan?"readonly":""}}>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>