<input name="pb_no" type="hidden" value="{{ $loan?$loan->pb_no:old('pb_no', $pb_no) }}"/>
<input name="oath_5" id="oath-5" type="hidden" value="{{ $loan?$loan->oath_5:old('oath_5') }}"/>
<input name="oath_6" id="oath-6" type="hidden" value="{{ $loan?$loan->oath_6:old('oath_5') }}"/>
<input name="cert_application_date" type="hidden" value="{{$loan?$loan->cert_application_date:date('Y-m-d')}}"/>
<input type="hidden" class="form-control" id="applicant" name="applicant" value="{{$loan?$loan->applicant:auth()->user()->fname.' '.auth()->user()->lname}}" {{$loan?"readonly":""}}>
<input type="hidden" class="form-control" name="address" value="{{$loan?$loan->address:auth()->user()->member->address}}" placeholder="Current address" {{$loan?"readonly":""}}>
<input type="hidden" class="form-control" name="date_employed" value="{{$loan?$loan->date_employed:auth()->user()->member->date_employed}}" {{$loan?"readonly":""}}>
<input type="hidden" class="form-control" name="position" value="{{$loan?$loan->position:auth()->user()->member->position}}" {{$loan?"readonly":""}}>
<input type="hidden" class="form-control" name="spouse" value="{{$loan?$loan->spouse:auth()->user()->member->spouse}}" {{$loan?"readonly":""}}>
<input type="hidden" class="form-control" name="birthdate" value="{{$loan?$loan->birthdate:auth()->user()->member->birthdate}}" {{$loan?"readonly":""}}>
<input type="hidden" step="any" class="form-control" name="age" value="{{$loan?$loan->age:auth()->user()->member->age}}" {{$loan?"readonly":""}}>
<input type="hidden" class="form-control" name="employer" value="{{$loan?$loan->employer:auth()->user()->member->employer}}" {{$loan?"readonly":""}}>
<input type="hidden" step="any" class="form-control" name="monthly_salary" value="{{$loan?$loan->monthly_salary:auth()->user()->member->monthly_salary}}" {{$loan?"readonly":""}}>
<input type="hidden" class="form-control" name="employment_status" value="{{$loan?$loan->employment_status:auth()->user()->member->employment_status}}" {{$loan?"readonly":""}}>
<input type="hidden" step="any" class="form-control" name="no_of_dependents" value="{{$loan?$loan->no_of_dependents:auth()->user()->member->no_of_dependents}}" {{$loan?"readonly":""}}>
<input type="hidden" class="form-control" name="contact_number" value="{{$loan?$loan->contact_number:auth()->user()->member->contact_number}}" {{$loan?"readonly":""}}>
@if($loan)
<input type="hidden" name="type_id" value="{{$loan->type_id}}">
<input type="hidden" name="id" value="{{$loan->id}}">
<input type="hidden" name="co1_id" value="{{$loan->co1_id}}">
<input type="hidden" name="co2_id" value="{{$loan->co2_id}}">
@endif