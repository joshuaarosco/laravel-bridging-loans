<div class="row row-same-height">
    <div class="col-md-12">
        <div class="mb-4 sm-padding-5">
            <h2>Co-Borrower's Information</h2>
        </div>
    </div>
    <div class="col-md-6 b-r b-dashed b-grey sm-b-b">
        <div class="sm-padding-5">
            <!-- <form role="form"> -->

                <div class="row m-b-20">
                    <div class="col-md-12">
                        @if(!$loan)
                        <select name="co1_id" value="{{$loan?$loan->co1_id:old('co1_id')}}" id="co1-id" class="cs-select cs-skin-slide" data-init-plugin="cs-select" {{$loan?"readonly":""}}>
                            <option value="">-- Select Co-Borrower 1 --</option>
                            @foreach($coBorrowers as $index => $coBorrower)
                            <option value="{{$coBorrower['id']}}">{{$coBorrower['name']}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>

                <div class="form-group-attached">
                    @if(!$loan)
                    <!-- <div class="form-group form-group-default">
                        <label>Name</label> -->
                        <input type="hidden" class="form-control" id="co1_name" name="co1_name" value="{{$loan?$loan->co1_name:old('co1_name')}}" readonly>
                    <!-- </div> -->
                    @else
                    <div class="form-group form-group-default">
                        <label>Name</label>
                        <input type="text" class="form-control" id="co1_name" name="co1_name" value="{{$loan?$loan->co1_name:old('co1_name')}}" readonly>
                    </div>
                    @endif
                    <div class="form-group form-group-default">
                        <label>Address</label>
                        <input type="text" class="form-control" id="co1_address" name="co1_address" value="{{$loan?$loan->co1_address:old('co1_address')}}" placeholder="" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Date Employed</label>
                        <input type="text" class="form-control" id="co1_date_employed" name="co1_date_employed" value="{{$loan?$loan->co1_date_employed:old('co1_date_employed')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Position</label>
                        <input type="text" class="form-control" id="co1_position" name="co1_position" value="{{$loan?$loan->co1_position:old('co1_position')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Contact #</label>
                        <input type="tel" class="form-control" id="co1_contact_number" name="co1_contact_number" value="{{$loan?$loan->co1_contact_number:old('co1_contact_number')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Employer</label>
                        <input type="text" class="form-control" id="co1_employer" name="co1_employer" value="{{$loan?$loan->co1_employer:old('co1_employer')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Monthly Salary</label>
                        <input type="number" step="any" class="form-control" id="co1_monthly_salary" name="co1_monthly_salary" value="{{$loan?$loan->co1_monthly_salary:old('co1_monthly_salary')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Employment Status</label>
                        <input type="text" class="form-control" id="co1_employment_status" name="co1_employment_status" value="{{$loan?$loan->co1_employment_status:old('co1_employment_status')}}" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="sm-padding-5">
            <!-- <form role="form"> -->

                <div class="row m-b-20">
                    <div class="col-md-12">
                        @if(!$loan)
                        <select name="co2_id" value="{{$loan?$loan->co2_id:old('co2_id')}}" id="co2-id" class="cs-select cs-skin-slide" data-init-plugin="cs-select" {{$loan?"readonly":""}}>
                            <option value="">-- Select Co-Borrower 2 --</option>
                            @foreach($coBorrowers as $index => $coBorrower)
                            <option value="{{$coBorrower['id']}}">{{$coBorrower['name']}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>

                <div class="form-group-attached">
                    @if(!$loan)
                    <!-- <div class="form-group form-group-default">
                        <label>Name</label> -->
                        <input type="hidden" class="form-control" id="co2_name" name="co2_name" value="{{$loan?$loan->co2_name:old('co2_name')}}" readonly>
                    <!-- </div> -->
                    @else
                    <div class="form-group form-group-default">
                        <label>Name</label>
                        <input type="text" class="form-control" id="co2_name" name="co2_name" value="{{$loan?$loan->co2_name:old('co2_name')}}" readonly>
                    </div>
                    @endif
                    <div class="form-group form-group-default">
                        <label>Address</label>
                        <input type="text" class="form-control" id="co2_address" name="co2_address" value="{{$loan?$loan->co2_address:old('co2_address')}}" placeholder="" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Date Employed</label>
                        <input type="text" class="form-control" id="co2_date_employed" name="co2_date_employed" value="{{$loan?$loan->co2_date_employed:old('co2_date_employed')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Position</label>
                        <input type="text" class="form-control" id="co2_position" name="co2_position" value="{{$loan?$loan->co2_position:old('co2_position')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Contact #</label>
                        <input type="tel" class="form-control" id="co2_contact_number" name="co2_contact_number" value="{{$loan?$loan->co2_contact_number:old('co2_contact_number')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Employer</label>
                        <input type="text" class="form-control" id="co2_employer" name="co2_employer" value="{{$loan?$loan->co2_employer:old('co2_employer')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Monthly Salary</label>
                        <input type="number" step="any" class="form-control" id="co2_monthly_salary" name="co2_monthly_salary" value="{{$loan?$loan->co2_monthly_salary:old('co2_monthly_salary')}}" readonly>
                    </div>
                    <div class="form-group form-group-default">
                        <label>Employment Status</label>
                        <input type="text" class="form-control" id="co2_employment_status" name="co2_employment_status" value="{{$loan?$loan->co2_employment_status:old('co2_employment_status')}}" readonly>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>