<div class="row">
    <div class="col-sm-12">
        <address class="m-t-30">
        Loan Documents Evaluated by: <input class="loan-input w-20" name="evaluated_by" value="{{$loan?$loan->evaluated_by:old('evaluated_by')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        </address>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <address class="text-underline">
        Recommending Approval:
        </address>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <address>
        At a meeting held on 
        <input class="loan-input" name="meeting_1" value="{{$loan?$loan->meeting_1:old('meeting_1')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> 20
        <input class="loan-input" name="meeting_2" value="{{$loan?$loan->meeting_2:old('meeting_2')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>, we approve the above loan in the amount and on the conditions requested by applicant, except as for the following (list any changes in amount, terms or conditions): 
        <input class="loan-input" name="meeting_3" value="{{$loan?$loan->meeting_3:old('meeting_3')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br> The Committee's action is recorded in the minutes of 
        <input class="loan-input" name="meeting_4" value="{{$loan?$loan->meeting_4:old('meeting_4')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>, 20
        <input class="loan-input" name="meeting_5" value="{{$loan?$loan->meeting_5:old('meeting_5')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>.
        </address>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <address class="text-underline m-t-30">
        Members of the Credit Committee: 
        </address>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-sm-4 text-center">
        @if(!in_array(auth()->user()->type, ['member']))
            @if($loan AND $loan->chair != null)
            <div class="col-md-12">
                <img src="{{asset($loan->chair)}}" alt="">
            </div>
            <input class="loan-input w-70 text-center" name="chair_name" value="{{$loan?$loan->chair_name:old('chair_name')}}" type="text" readonly/>
            @else
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div id="sig-chair" class="signature"></div>
                    <br>
                    <textarea id="signature-chair" name="chair" style="display: none"></textarea>
                </div>
                <div class="col-md-2">
                    <button id="clear-chair" class="btn btn-danger"><i class="fa fa-repeat"></i></button>
                </div>
            </div>
            <input class="loan-input w-70 text-center" name="chair_name" value="{{$loan?$loan->chair_name:old('chair_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
            @endif
        @else
        @if($loan)
            <div class="col-md-12">
                <img src="{{asset($loan->chair)}}" alt="">
            </div>
        @endif
        <input class="loan-input w-70 text-center" name="chair_name" value="{{$loan?$loan->chair_name:old('chair_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        @endif 
        <br>
        <address>
        Chair
        </address>
    </div>
    <div class="col-sm-4 text-center">
        @if(!in_array(auth()->user()->type, ['member']))
            @if($loan AND $loan->member_1 != null)
            <div class="col-md-12">
                <img src="{{asset($loan->member_1)}}" alt="">
            </div>
            <input class="loan-input w-70 text-center" name="member_1_name" value="{{$loan?$loan->member_1_name:old('member_1_name')}}" type="text" readonly/>
            @else
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div id="sig-member-1" class="signature"></div>
                    <br>
                    <textarea id="signature-member-1" name="member_1" style="display: none"></textarea>
                </div>
                <div class="col-md-2">
                    <button id="clear-member-1" class="btn btn-danger"><i class="fa fa-repeat"></i></button>
                </div>
            </div>
            <input class="loan-input w-70 text-center" name="member_1_name" value="{{$loan?$loan->member_1_name:old('member_1_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
            @endif
        @else
        @if($loan)
            <div class="col-md-12">
                <img src="{{asset($loan->member_1)}}" alt="">
            </div>
        @endif
        <input class="loan-input w-70 text-center" name="member_1_name" value="{{$loan?$loan->member_1_name:old('member_1_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> 
        @endif
        <br>
        <address>
        Member
        </address>
    </div>
    <div class="col-sm-4 text-center">
        @if(!in_array(auth()->user()->type, ['member']))
            @if($loan AND $loan->member_2 != null)
            <div class="col-md-12">
                <img src="{{asset($loan->member_2)}}" alt="">
            </div>
            <input class="loan-input w-70 text-center" name="member_2_name" value="{{$loan?$loan->member_2_name:old('member_2_name')}}" type="text" readonly/>
            @else
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div id="sig-member-2" class="signature"></div>
                    <br>
                    <textarea id="signature-member-2" name="member_2" style="display: none"></textarea>
                </div>
                <div class="col-md-2">
                    <button id="clear-member-2" class="btn btn-danger"><i class="fa fa-repeat"></i></button>
                </div>
            </div>
            <input class="loan-input w-70 text-center" name="member_2_name" value="{{$loan?$loan->member_2_name:old('member_2_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
            @endif
        @else
        @if($loan)
            <div class="col-md-12">
                <img src="{{asset($loan->member_2)}}" alt="">
            </div>
        @endif
        <input class="loan-input w-70 text-center" name="member_2_name" value="{{$loan?$loan->member_2_name:old('member_2_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> 
        @endif
        <br>
        <address>
        Member
        </address>
    </div>
</div>
<div class="row">
    <div class="col-sm-5">
        <address class="m-t-30">
        Approved:
        </address>
    </div>
    <div class="col-sm-7">
        <address class="m-t-30">
        For Special Loan:
        </address>
    </div>
</div>
<div class="row m-t-20">
    <div class="col-sm-5 text-center">
        @if(in_array(auth()->user()->type, ['chairman', 'general_manager']) )
        <div class="row">
            <div class="col-md-6">
                @if(!$loan->cob)
                <div class="row">
                    <div class="col-md-3">
                        <button id="clear-cob" class="btn btn-danger"><i class="fa fa-repeat"></i></button>
                    </div>
                    <div class="col-md-9">
                        <div id="sig-cob" class="signature"></div>
                        <br>
                        <textarea id="signature-cob" name="cob" style="display: none"></textarea>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <img src="{{asset($loan->cob)}}" alt="">
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                @if(!$loan->gm)
                <div class="row">
                    <div class="col-md-3">
                        <button id="clear-gm" class="btn btn-danger"><i class="fa fa-repeat"></i></button>
                    </div>
                    <div class="col-md-9">
                        <div id="sig-gm" class="signature"></div>
                        <br>
                        <textarea id="signature-gm" name="gm" style="display: none"></textarea>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-9">
                        <img src="{{asset($loan->gm)}}" alt="">
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                @endif
            </div>
        </div>
        @if(!$loan->cob_name)
        <input class="loan-input text-center" name="cob_name" value="{{$loan?$loan->cob_name:old('cob_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        @else
        <input class="loan-input text-center" name="cob_name" value="{{$loan?$loan->cob_name:old('cob_name')}}" type="text" readonly/>
        @endif
        /
        
        @if(!$loan->gm_name)
        <input class="loan-input text-center" name="gm_name" value="{{$loan?$loan->gm_name:old('gm_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        @else
        <input class="loan-input text-center" name="gm_name" value="{{$loan?$loan->gm_name:old('gm_name')}}" type="text" readonly/>
        @endif
        
        @else
        @if($loan)
        <div class="row">
            <div class="col-md-6">
                @if($loan->cob)
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-9">
                        <img src="{{asset($loan->cob)}}" alt="">
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                @if($loan->gm)
                <div class="row">
                    <div class="col-md-9">
                        <img src="{{asset($loan->gm)}}" alt="">
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif
        <input class="loan-input text-center" name="cob_name" value="{{$loan?$loan->cob_name:old('cob_name')}}" type="text" readonly/>/
        <input class="loan-input text-center" name="gm_name" value="{{$loan?$loan->gm_name:old('gm_name')}}" type="text" readonly/> 
        @endif
        <address>
        Chair of the Board/General Manager
        </address>
    </div>
    <div class="col-sm-7">
        <div class="row">
            <div class="col-sm-6 text-center">
                @if(in_array(auth()->user()->type, ['admin', 'super_user']) )
                <input class="loan-input w-70 text-center" name="ao_name" value="{{$loan?$loan->ao_name:old('ao_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
                @else
                <input class="loan-input w-70 text-center" name="ao_name" value="{{$loan?$loan->ao_name:old('ao_name')}}" type="text" readonly/><br>
                @endif
                <address>
                Administrative Officer
                </address>
            </div>
            <div class="col-sm-6 text-center">
                @if(in_array(auth()->user()->type, ['admin', 'super_user']) )
                <input class="loan-input w-70 text-center" name="cc_name" value="{{$loan?$loan->cc_name:old('cc_name')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/><br>
                @else
                <input class="loan-input w-70 text-center" name="cc_name" value="{{$loan?$loan->cc_name:old('cc_name')}}" type="text" readonly/><br>
                @endif
                <address>
                Campus Cashier
                </address>
            </div>
        </div>
    </div>
</div>