<div class="row row-same-height">
    <div class="col-md-12">
        <div class="sm-padding-5 sm-m-t-15">
            <h2>Loan Application Summary</h2>
            <p>Below is the summary of your Loan Application</p>
            @if(!$loan)
            <p class="small hint-text">Please confirm the information below.</p>
            @endif
            <table class="table table-condensed">
                <tr>
                    <td class=" col-md-9">
                        <span class="m-l-10 font-montserrat fs-11 all-caps">Applicant's Name</span>
                    </td>
                    <td class=" col-md-3 text-right">
                        @if(!$loan)
                        <span id="applicant-txt">{{ auth()->user()->fname.' '.auth()->user()->lname }}</span>
                        @else
                        <span>{{$loan->applicant}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class=" col-md-9">
                        <span class="m-l-10 font-montserrat fs-11 all-caps">Loan Amount</span>
                    </td>
                    <td class=" col-md-3 text-right">
                        @if(!$loan)
                        <span id="loan-amount-txt">₱ 0.00</span>
                        @else
                        <span>₱ {{number_format($loan->oath_1)}}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="col-md-9">
                        <span class="m-l-10 font-montserrat fs-11 all-caps">Loan Type</span>
                    </td>
                    <td class="col-md-3 text-right">
                        @if(!$loan)
                        <span id="loan-type-txt">---</span>
                        @else
                            @foreach($loanTypes as $index => $loanType)
                                @if($loan AND $loan->type_id == $loanType->id)
                                    <span>{{$loanType->title}} - {{$loanType->interest}}% per {{$loanType->rate}}</span>
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class=" col-md-9">
                        <span class="m-l-10 font-montserrat fs-11 all-caps">Loan Amount with Interest</span>
                    </td>
                    <td class="col-md-3 text-right">
                        @if(!$loan)
                        <h4 class="text-primary no-margin font-montserrat" id="loan-interest-txt">₱ 0.00</h4>
                        @else
                        <h4 class="text-primary no-margin font-montserrat" id="loan-interest-txt">₱ {{number_format($loan->oath_5)}}</h4>
                        @endif
                    </td>
                </tr>
            </table>
            @if(!$loan)
            <p class="small m-t-50">Submit the Loan Application if all the details are correct.</a></p>
            <p class="small">The Credit Committee will receive your Loan Application once you Submit the form.</a></p>
            @endif
            </div>
        </div>
    </div>
</div>