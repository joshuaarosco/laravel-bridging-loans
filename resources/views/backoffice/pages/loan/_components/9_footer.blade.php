<div class="row">
    <div class="col-sm-7 m-t-50">
        <div class="row">
            <div class="col-sm-8 text-center">
                @if($loan)
                    @if($loan->footer_signed)
                    <div class="row">
                        <div class="col-md-10">
                            <img src="{{asset($loan->cert_signed)}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 text-center b-bottom">
                        @if($loan)
                            {{Str::upper($loan->user->fname)}} {{Str::upper($loan->user->lname)}}
                        @else
                            {{Str::upper(auth()->user()->fname)}} {{Str::upper(auth()->user()->lname)}}
                        @endif
                        </div>
                    </div>
                    @else
                    <input class="loan-input w-90 text-center" name="footer_signed_name" type="text" readonly/>
                    @endif
                @else
                <input class="loan-input w-90 text-center" name="footer_signed_name" type="text" readonly/>
                @endif
                <br>
                <address class="fw-500">
                Applicant's Signature over Printed Name
                </address>
            </div>
            <div class="col-sm-4 text-center">
                @if($loan)
                    @if($loan->footer_date)
                    <input class="loan-input text-center mt-75" name="footer_date" value="{{$loan?$loan->footer_date:old('footer_date')}}" type="date" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
                    @else
                    <input class="loan-input text-center" name="footer_date" value="{{$loan?$loan->footer_date:old('footer_date')}}" type="date" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
                    @endif
                @else
                <input class="loan-input text-center" name="footer_date" value="{{$loan?$loan->footer_date:old('footer_date')}}" type="date" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
                @endif
                <address class="fw-500">
                Date
                </address>
            </div>
        </div>
        <div class="row m-t-30">
            <div class="col-md-12">
                <address><i>~ Save and Earn the Cooperative Way ~</i></address>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="green-box">
            <div class="row">
                <div class="col-sm-12">
                <address>Payment Verification:</address>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                <address>CDV # <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} class="loan-input green-box-input" name="cdv_no" value="{{$loan?$loan->cdv_no:old('cdv_no')}}" type="text"/></address>
                </div>
                <div class="col-sm-5">
                <address>Date <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} class="loan-input green-box-input" name="cdv_date" value="{{$loan?$loan->cdv_date:old('cdv_date')}}" type="date"/></address>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                <address>Case/Check # <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} class="loan-input w-60 green-box-input" name="cc_no" value="{{$loan?$loan->cc_no:old('cc_no')}}" type="text"/></address>
                </div>
                <div class="col-sm-5">
                <address>Date <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} class="loan-input green-box-input" name="cc_date" value="{{$loan?$loan->cc_date:old('cc_date')}}" type="date"/></address>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <address>Issued by <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} class="loan-input green-box-input" name="issued_by" value="{{$loan?$loan->issued_by:old('issued_by')}}" type="text"/></address>
                </div>
            </div>
        </div>
    </div>
</div>