<address class="m-t-10">
    I hereby apply for a loan of 
    <input class="loan-input" name="oath_1" value="{{$loan?$loan->oath_1:old('oath_1')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> PESOS for a period of 
    <input class="loan-input" name="oath_2" value="{{$loan?$loan->oath_2:old('oath_2')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> months, to be paid in 
    <input class="loan-input" name="oath_3" value="{{$loan?$loan->oath_3:old('oath_3')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> equal installment of 
    <input class="loan-input" name="oath_4" value="{{$loan?$loan->oath_4:old('oath_4')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>pesos (P
    <input class="loan-input" name="oath_5" value="{{$loan?$loan->oath_5:(Input::has('oath_5')?Input::get('oath_5'):old('oath_5'))}}" type="number" step="any" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>) plus interest of 
    <input class="loan-input loan-small" name="oath_6" value="{{$loan?$loan->oath_6:(Input::has('oath_6')?Input::get('oath_6'):old('oath_6'))}}" type="number" step="any" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> I prefer the first payment to be due on 
    <input class="loan-input" name="oath_7" value="{{$loan?$loan->oath_7:old('oath_7')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>.
    </address>
    <address class="m-t-10 fw-500">
    <div class="row">
        <div class="col-sm-4">
            Loan Purpose <input class="loan-input loan-justified" name="purpose" value="{{$loan?$loan->purpose:old('purpose')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        </div>
        <div class="col-sm-4">
            Collateral <input class="loan-input loan-justified" name="collateral" value="{{$loan?$loan->collateral:old('collateral')}}" type="text" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>
        </div>
        <div class="col-sm-4">
            Loan Type
            <select name="type_id" value="{{$loan?$loan->type_id:old('type_id')}}" class="loan-input loan-justified {{$errors->has('type_id')?'loan-input-error':null}}" id="" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}>
                <option value="">---</option>
                @foreach($loanTypes as $index => $loanType)
                @if(($loan AND $loan->type_id == $loanType->id) OR (Input::has('type_id') AND Input::get('type_id') == $loanType->id))
                <option value="{{$loanType->id}}" selected>{{$loanType->title}} - {{$loanType->interest}}% per {{$loanType->rate}}</option>
                @else
                <option value="{{$loanType->id}}">{{$loanType->title}} - {{$loanType->interest}}% per {{$loanType->rate}}</option>
                @endif
                @endforeach
            </select>
            @if($errors->has('type_id'))
            <label class="error" for="type_id">{{$errors->first('type_id')}}</label>
            @endif
        </div>
    </div>
</address>