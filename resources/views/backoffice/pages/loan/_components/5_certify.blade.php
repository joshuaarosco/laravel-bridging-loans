<div class="row">
    <div class="col-sm-12">
        <address class="m-t-30">
        I hereby certify that all statements made are true and complete and submitted for the purpose of obtaining credit and authorize PSUMPC to obtain additional information as may be required in connection with my loan application.
        </address>
    </div>
    </div>
    <div class="row m-t-30">
    <div class="col-sm-4 text-center">
        <input class="loan-input w-30 mt-75 text-center" name="cert_application_date" type="date" value="{{$loan?$loan->cert_application_date:date('Y-m-d')}}" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> <br>
        <address class="fw-500">
        Date 
        </address>
    </div>
    <div class="col-sm-4">
        <!-- <input class="loan-input w-80" type="file" value=""/>  -->
        <div class="row">
            @if($loan)
            <div class="col-md-12">
                <img src="{{asset($loan->cert_signed)}}" alt="">
            </div>
            @else
            <div class="col-md-10">
                <div id="sig" class="signature"></div>
                <br>
                <textarea id="signature" name="cert_signed" style="display: none"></textarea>
            </div>
            <div class="col-md-2">
                <button id="clear" class="btn btn-danger"><i class="fa fa-repeat"></i></button>
            </div>
            @endif
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
        <address class="fw-500">
            <div class="col-md-10 text-center">
                Applicant's Prited Name and Signature
            </div>
        </address>
    </div>
    <div class="col-sm-4 text-center">
        <input class="loan-input w-70 mt-75 text-center" name="cert_address" type="text" value="{{$loan?$loan->cert_address:old('cert_address')}}" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> <br>
        <address class="fw-500">
        Address
        </address>
    </div>
</div>