<div class="row row-same-height">
    <div class="col-md-7">
        <div class="sm-padding-5">
            <!-- <form role="form"> -->
                <h2 class="pull-left no-margin">Loan Detail</h2>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default required m-t-25" id="loan-amount-div">
                            <label>Loan Amount</label>
                            <input type="number" min="0" class="form-control" id="loan-amount" name="oath_1" value="{{$loan?$loan->oath_1:old('oath_1', Input::has('oath_1')?Input::get('oath_1'):'' )}}" placeholder="Loan Amount in Peso" {{$loan?"readonly":""}}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default required m-t-25">
                            <label>To be paid in:</label>
                            <input type="number" min="0" class="form-control" name="oath_2" value="{{$loan?$loan->oath_2:old('oath_2', Input::has('oath_2')?Input::get('oath_2'):'' )}}" placeholder="Number of Months">
                        </div>
                    </div>
                </div>
                <label id="loan-amount-error" class="error" for="firstName">Loan Amount should be less or equal to the Loan Limit</label>
                <div class="row">
                    <div class="col-md-6">
                        <label>Loan Type</label>
                        <br>
                        @if(!$loan)
                        <select name="type_id" value="{{$loan?$loan->type_id:old('type_id')}}" id="loan-type" class="cs-select cs-skin-slide {{$errors->has('type_id')?'loan-input-error':null}}" data-init-plugin="cs-select" {{$loan?"readonly":""}}>
                            <option value="">---</option>
                            @foreach($loanTypes as $index => $loanType)
                            @if(($loan AND $loan->type_id == $loanType->id) OR (Input::has('type_id') AND Input::get('type_id') == $loanType->id))
                            <option value="{{$loanType->id}}" selected>{{$loanType->title}} - {{$loanType->interest}}% per {{$loanType->rate}}</option>
                            @else
                            <option value="{{$loanType->id}}">{{$loanType->title}} - {{$loanType->interest}}% per {{$loanType->rate}}</option>
                            @endif
                            @endforeach
                        </select>
                        @else
                            @foreach($loanTypes as $index => $loanType)
                                @if($loan AND $loan->type_id == $loanType->id)
                                    <p>{{$loanType->title}} - {{$loanType->interest}}% per {{$loanType->rate}}</p>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                @if(!$loan)
                <div class="form-group form-group-default m-t-25">
                    <label>Loan Limit</label>
                    <input type="number" min="0" class="form-control" id="loan-limit" readonly>
                </div>
                @else
                    @foreach($loanTypes as $index => $loanType)
                        @if($loan AND $loan->type_id == $loanType->id)
                        <div class="row">
                            <div class="col-md-6">
                                <label>Loan Limit</label>
                                <br>
                                <p>{{number_format($loanType->loan_limit,2)}}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            <!-- </form> -->
        </div>
    </div>
</div>