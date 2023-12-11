<input type="hidden" name="type" value="member">
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group form-group-default required {{$errors->has('fname')?'has-error':null}}">
                    <label>First Name</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-fname" name="fname" value="{{old('fname')}}" id="fname" placeholder="" maxlength="30" required>
                </div>
                @if($errors->has('fname'))
                <label class="error" for="fname">{{$errors->first('fname')}}</label>
                @endif
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-default">
                    <label>Middle Name</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-mname" name="mname" value="{{old('mname')}}" id="mname" placeholder="" maxlength="30">
                </div>
                @if($errors->has('mname'))
                <label class="error" for="mname">{{$errors->first('mname')}}</label>
                @endif
            </div>
            <div class="col-md-4">
                <div class="form-group form-group-default required {{$errors->has('lname')?'has-error':null}}">
                    <label>Last Name</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-lname" name="lname" value="{{old('lname')}}" id="lname" placeholder="" maxlength="30" required>
                </div>
                @if($errors->has('lname'))
                <label class="error" for="lname">{{$errors->first('lname')}}</label>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Birthdate</label>
                    <input type="date" class="form-control {{Str::lower($title)}}-birthdate" name="birthdate" value="{{old('birthdate')}}" id="birthdate">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Age</label>
                    <input type="number" step="any" class="form-control {{Str::lower($title)}}-age" name="age" value="{{old('age')}}" id="age">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default">
                    <label>Spouse</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-spouse" name="spouse" value="{{old('spouse')}}" id="spouse">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default">
                    <label>Address</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-address" name="address" value="{{old('address')}}" id="address">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default required {{$errors->has('email')?'has-error':null}}">
                    <label>Email</label>
                    <input type="email" class="form-control {{Str::lower($title)}}-email" name="email" value="{{old('email')}}" id="email" required>
                    @if($errors->has('email'))
                    <label class="error" for="email">{{$errors->first('email')}}</label>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Contact Number</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-contact_number" name="contact_number" value="{{old('contact_number')}}" id="contact_number">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Date Employed</label>
                    <input type="date" class="form-control {{Str::lower($title)}}-date_employed" name="date_employed" value="{{old('date_employed')}}" id="date_employed">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Position</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-position" name="position" value="{{old('position')}}" id="position">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Employer</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-employer" name="employer" value="{{old('employer')}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Monthly Salary</label>
                    <input type="number" class="form-control {{Str::lower($title)}}-monthly_salary" name="monthly_salary" value="{{old('monthly_salary')}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Employment Status</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-employment_status" name="employment_status" value="{{old('employment_status')}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>No of Dependents</label>
                    <input type="text" class="form-control {{Str::lower($title)}}-no_of_dependents" name="no_of_dependents" value="{{old('no_of_dependents')}}">
                </div>
            </div>
        </div>
    </div>
</div>


