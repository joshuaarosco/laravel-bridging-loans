<div class="row">
    <div class="col-sm-12">
        <address class="m-t-10">
        Note: Additional Charges (fine) of 
        <input class="loan-input" name="note_1" type="number" step="any" value="{{$loan? $loan->note_1:old('note_1')}}" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/> percent (
        <input class="loan-input" name="note_2" type="number" step="any" value="{{$loan? $loan->note_2:old('note_2')}}" {{auth()->user()->type == 'credit_committee'?'':'readonly'}}/>)% in case stipulations in the promissory note are not met by the debtor I acknowledge receipt of a copy of this statement prior to the consummation of the transaction and I understand and fully agree to the terms and conditions thereof.
        </address>
    </div>
</div>