@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' Form')

@push('css')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .loan-status-div{
      border: 1px solid #a7c24d;
      text-align: center;
      margin-top: 20px;
      background: #a7c24d38;
    }
    .loan-rejected{
      border: 1px solid #c24d4d;
      text-align: center;
      margin-top: 20px;
      background: #c24d4d38;
    }
    .form-control[readonly]{
        color: #21252d;
    }
</style>
@endpush

@push('content')
<div class="content ">
    <!-- START CONTAINER FLUID -->
    <div class=" container-fluid   container-fixed-lg">
    
        <div class="loan-status-div {{$loan?($loan->loan_status == 'rejected'?'loan-rejected':''):''}}">
            <h2><strong>{{$loan?$loan_statuses[$loan->loan_status]:'New Loan Application'}}</strong></h2>
        </div>

        @if(session()->has('notification-status'))
        <div class="m-t-35 alert alert-{{session()->get('notification-status')}}" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>{{Str::title(session()->get('notification-status'))}}: </strong> {{session()->get('notification-msg')}}
        </div>
        @endif
        <form action="" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('backoffice.pages.loan.new_application_hidden_fields')
            <div id="rootwizard" class="m-t-20">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <!-- <li class="nav-item">
                    <a class="active d-flex align-items-center" data-toggle="tab" href="#tab1" data-target="#tab1" role="tab"><i class="material-icons fs-14 tab-icon">account_circle</i> <span>Member Information</span></a>
                </li>-->
                <li class="nav-item">
                    <a class="d-flex align-items-center" data-toggle="tab" href="#tab2" data-target="#tab2" role="tab"><i class="material-icons fs-14 tab-icon">people</i> <span>Co-Borrower's Information</span></a>
                </li> 
                <li class="nav-item">
                    <a class="active d-flex align-items-center" data-toggle="tab" href="#tab3" data-target="#tab3" role="tab"><i class="material-icons fs-14 tab-icon">payment</i> <span>Loan Detail</span></a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center" data-toggle="tab" href="#tab4" data-target="#tab4" role="tab"><i class="material-icons fs-14 tab-icon">done</i> <span>Summary</span></a>
                </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    @if($errors->has('applicant'))
                        <div class="alert alert-warning" role="alert">
                            <button class="close" data-dismiss="alert"></button>
                            {{$errors->first('applicant')}}
                        </div>
                    @endif
                    @if($errors->has('oath_1'))
                        <div class="alert alert-warning" role="alert">
                            <button class="close" data-dismiss="alert"></button>
                            {{$errors->first('oath_1')}}
                        </div>
                    @endif
                    @if($errors->has('type_id'))
                        <div class="alert alert-warning" role="alert">
                            <button class="close" data-dismiss="alert"></button>
                            {{$errors->first('type_id')}}
                        </div>
                    @endif
                    {{-- <div class="tab-pane padding-20 sm-no-padding active slide-left" id="tab1">
                        <div class="padding-30">
                            @include('backoffice.pages.loan.new_application_tab_1')
                        </div>
                    </div> --}}


                    <div class="tab-pane slide-left padding-20 sm-no-padding active" id="tab2">
                        <div class="padding-30">
                            @include('backoffice.pages.loan.new_application_tab_2')
                        </div>
                    </div>


                    <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab3">
                        <div class="padding-30">
                            @include('backoffice.pages.loan.new_application_tab_3')
                        </div>
                    </div>

                    <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab4">
                        <div class="padding-30">
                            @include('backoffice.pages.loan.new_application_tab_4')
                        </div>
                    </div>

                    <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                        <ul class="pager wizard no-style">
                        <li class="next">
                            <button aria-label="" class="btn btn-primary btn-cons from-left pull-right" type="button">
                                <span>Next</span>
                            </button>
                        </li>
                        @if(!$loan)
                        <li class="next finish hidden">
                            <button aria-label="" class="btn btn-primary btn-cons from-left pull-right" type="submit">
                                <span>Submit</span>
                            </button>
                        </li>
                        @endif
                        <li class="previous first hidden">
                            <button aria-label="" class="btn btn-default btn-cons from-left pull-right" type="button">
                                <span>First</span>
                            </button>
                        </li>
                        <li class="previous">
                            <button aria-label="" class="btn btn-default btn-cons from-left pull-right" type="button">
                                <span>Previous</span>
                            </button>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- END CONTAINER FLUID -->
</div>
@endpush
@push('js')
<script type="text/javascript">
$(function() {
    $(".page-load").hide();
});
</script>

<script src="{{asset('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/js/form_wizard.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/scripts.js')}}" type="text/javascript"></script>

<script>
    let loanInterests = {};
    let loanTypes = {};

    @foreach($loanTypes as $index => $loanType)
    loanInterests[{!!$loanType->id!!}] = {!!$loanType->interest!!};
    loanTypes[{!!$loanType->id!!}] = "{!!$loanType->title!!} - {!!$loanType->interest!!} per {!!$loanType->title!!}";
    @endforeach

    $("#applicant").on("load change", function(){
        console.log($(this).val());
        var name = $(this).val();
        $("#applicant-txt").text(name);
    });

    $("#loan-amount").on("load change", function(){
        console.log($(this).val());
        var amount = $(this).val();

        var loan_id = $("#loan-type").val();

        var interest = loanInterests[loan_id];


        $("#loan-amount-txt").text("₱ "+parseFloat(parseFloat(amount).toFixed(2)).toLocaleString());

        var amountWithInterest = parseFloat(amount) * parseFloat(interest);
        $("#oath-5").val(amountWithInterest);
        $("#oath-6").val(interest);

        $("#loan-interest-txt").text("₱ "+parseFloat(parseFloat(amountWithInterest).toFixed(2)).toLocaleString());
    });

    $("#loan-type").on("load change", function(){
        console.log($(this).val());

        var loan_id = $(this).val();
        var interest = loanInterests[loan_id];

        var amount = $("#loan-amount").val();

        var amountWithInterest = parseFloat(amount) * parseFloat(interest);
        $("#oath-5").val(amountWithInterest);
        $("#oath-6").val(interest);

        $("#loan-type-txt").text(loanTypes[loan_id]);
        $("#loan-interest-txt").text("₱ "+parseFloat(parseFloat(amountWithInterest).toFixed(2)).toLocaleString());
    });
    var amount = 0;
    @if(Input::has('oath_1'))
    amount = {!! Input::get('oath_1') !!}
    @endif

    var loan_id;
    @if(Input::has('type_id'))
    loan_id = {!! Input::get('type_id') !!}
    @endif

    @if(Input::has('oath_1') AND Input::has('type_id'))
    var interest = loanInterests[loan_id];
    var amountWithInterest = parseFloat(amount) * parseFloat(interest);
    $("#oath-5").val(amountWithInterest);
    $("#oath-6").val(interest);

    
    $("#loan-amount-txt").text("₱ "+parseFloat(parseFloat(amount).toFixed(2)).toLocaleString());
    $("#loan-type-txt").text(loanTypes[loan_id]);
    $("#loan-interest-txt").text("₱ "+parseFloat(parseFloat(amountWithInterest).toFixed(2)).toLocaleString());
    @endif

    $("#co1-id").on("change", function(){
        let id = $(this).val();
        getMemberDetail(id, "co1");
    });

    $("#co2-id").on("change", function(){
        let id = $(this).val();
        getMemberDetail(id, "co2");
    });

    function getMemberDetail(memberId, co){
        console.log(memberId);
        $.ajax({
            type: "POST",
            url: "{{route('backoffice.profile.loan.co_borrower')}}",
            data: { _id : memberId , _token : "{{csrf_token()}}" },
            dataType: "json",
            async: true,
            success: function(data){
                const {
                    id,
                    email,
                    fname,
                    mname,
                    lname,
                    active,
                    address,
                    date_employed,
                    position,
                    spouse,
                    birthdate,
                    age,
                    employer,
                    monthly_salary,
                    employment_status,
                    no_of_dependents,
                    contact_number,
                    coe,
                    bc,
                    lp,
                    id_pic,
                    fee,
                } = data.datas;
                console.log(data.datas);
                $("#"+co+"_name").val(fname+" "+lname);
                $("#"+co+"_address").val(address);
                $("#"+co+"_date_employed").val(date_employed);
                $("#"+co+"_position").val(position);
                $("#"+co+"_contact_number").val(contact_number);
                $("#"+co+"_employer").val(employer);
                $("#"+co+"_monthly_salary").val(monthly_salary);
                $("#"+co+"_employment_status").val(employment_status);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

</script>
@endpush