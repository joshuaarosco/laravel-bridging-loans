<div class="row">
    <div class="col-sm-12 text-center">
        <address class="text-underline m-t-30 fw-500">
        DISCLOSURE STATEMENT
        </address>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 plr-20 loan-text">
        <table class="w-100 loan-table" border="1">
        <tr>
            <td colspan="4">Loan Granted</td>
            <td class="w-20">₱ <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="loan_granted" value="{{$loan?$loan->loan_granted:old('loan_granted')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td colspan="4">Less Charges</td>
            <td class="w-20"> <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="less_charges" value="{{$loan?$loan->less_charges:old('less_charges')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>Processing</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="processing" value="{{$loan?$loan->processing:old('processing')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td>Other Charges</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc0_val" value="{{$loan?$loan->oc0_val:old('oc0_val')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_0" value="{{$loan?$loan->total_0:old('total_0')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>Notarial Fee</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="notarial_fee" value="{{$loan?$loan->notarial_fee:old('notarial_fee')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc1_title" value="{{$loan?$loan->oc1_title:old('oc1_title')}}" type="text" class="disclosure-input pull-left"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc1_val" value="{{$loan?$loan->oc1_val:old('oc1_val')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_1" value="{{$loan?$loan->total_1:old('total_1')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>Previous Loan Balance</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="prev_loan_bal" value="{{$loan?$loan->prev_loan_bal:old('prev_loan_bal')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc2_title" value="{{$loan?$loan->oc2_title:old('oc2_title')}}" type="text" class="disclosure-input pull-left"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc2_val" value="{{$loan?$loan->oc2_val:old('oc2_val')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_2" value="{{$loan?$loan->total_2:old('total_2')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>Interest</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="interest" value="{{$loan?$loan->interest:old('interest')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc3_title" value="{{$loan?$loan->oc3_title:old('oc3_title')}}" type="text" class="disclosure-input pull-left"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc3_val" value="{{$loan?$loan->oc3_val:old('oc3_val')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_3" value="{{$loan?$loan->total_3:old('total_3')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>Share Capital</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="share_capital" value="{{$loan?$loan->share_capital:old('share_capital')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc4_title" value="{{$loan?$loan->oc4_title:old('oc4_title')}}" type="text" class="disclosure-input pull-left"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc4_val" value="{{$loan?$loan->oc4_val:old('oc4_val')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_4" value="{{$loan?$loan->total_4:old('total_4')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>First Installment</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="first_installment" value="{{$loan?$loan->first_installment:old('first_installment')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc5_title" value="{{$loan?$loan->oc5_title:old('oc5_title')}}" type="text" class="disclosure-input pull-left"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc5_val" value="{{$loan?$loan->oc5_val:old('oc5_val')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_5" value="{{$loan?$loan->total_5:old('total_5')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>Insurance</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="insurance" value="{{$loan?$loan->insurance:old('insurance')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc6_title" value="{{$loan?$loan->oc6_title:old('oc6_title')}}" type="text" class="disclosure-input pull-left"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc6_val" value="{{$loan?$loan->oc6_val:old('oc6_val')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_6" value="{{$loan?$loan->total_6:old('total_6')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>Insurance Refund</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="insurance_refund" value="{{$loan?$loan->insurance_refund:old('insurance_refund')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc7_title" value="{{$loan?$loan->oc7_title:old('oc7_title')}}" type="text" class="disclosure-input pull-left"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="oc7_val" value="{{$loan?$loan->oc7_val:old('oc7_val')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_7" value="{{$loan?$loan->total_7:old('total_7')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td>Fine/Penalty</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="fine_penalty" value="{{$loan?$loan->fine_penalty:old('fine_penalty')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td>Total Charges:</td>
            <td class="w-20"><input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_charges" value="{{$loan?$loan->total_charges:old('total_charges')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
            <td>₱ <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="total_charges_final" value="{{$loan?$loan->total_charges_final:old('total_charges_final')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        <tr>
            <td class="w-20"></td>
            <td class="w-20"></td>
            <td class="w-20"></td>
            <td class="fw-500">NET PROCEEDS</td>
            <td>₱ <input {{auth()->user()->type == 'credit_committee'?'':'readonly'}} name="net_proceeds" value="{{$loan?$loan->net_proceeds:old('net_proceeds')}}" min="0" type="number" step="any" class="disclosure-input pull-right"></td>
        </tr>
        </table>
    </div>
</div>