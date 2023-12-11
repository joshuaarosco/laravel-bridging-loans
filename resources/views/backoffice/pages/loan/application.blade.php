@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' Form')

@push('included-styles')
<style>
  .bg-contrast-higher {
    background-color: #212121 !important;
    color: #fff;
  }
  .loan-input{
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid #626262;
    font-family: Cambria; 
  }
  .disclosure-input{
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: none;
    font-family: Cambria; 
  }
  .loan-small{
    width: 50px;
    font-family: Cambria; 
  }
  .loan-justified{
    width: 75%;
    font-family: Cambria; 
  }
  .fw-500{
    font-family: Cambria; 
    font-weight: bolder;
  }
  address{ 
    font-family: Cambria; 
  }
  .loan-text{
    font-family: Cambria; 
  }
  .text-underline{
    text-decoration: underline;
  }
  .w-90{
    width: 90%;
  }
  .w-88{
    width: 88%;
  }
  .w-85{
    width: 85%;
  }
  .w-83{
    width: 83%;
  }
  .w-80{
    width: 80%;
  }
  .w-78{
    width: 78%;
  }
  .w-75{
    width: 75%;
  }
  .w-70{
    width: 70%;
  }
  .w-65{
    width: 65%;
  }
  .w-60{
    width: 60%;
  }
  .w-50{
    width: 50%;
  }
  .w-55{
    width: 55%;
  }
  .w-30{
    width: 30%;
  }
  .w-20{
    width: 20%;
  }
  .w-15{
    width: 12%;
  }
  .w-10{
    width: 10%;
  }
  .pl-20{
    padding-left: 20px;
  }
  .ml-22{
    margin-left: 22px;
  }
  .loan-table{
    border: 1px solid #626262;
  }
  .plr-20{
    padding-left: 50px;
    padding-right: 50px;
  }
  .green-box{
    border: 2px solid #657c2e;
    background: #a7c24d;
    padding: 20px 15px;
    margin-top: 10px;
    color: #000000;
  }
  .green-box-header{
    border: 2px solid #657c2e;
    background: #a7c24d;
    padding: 10px;
    margin-top: 10px;
    color: #000000;
    margin-right: 100px;
  }
  .green-box-input{
    background: #a7c24d;
    border-color: #000000; 
  }
  .loan-logo{
    position: absolute;
    height: 120px;
    width: 120px;
    top: -20px;
    left: 200px;
  }
  .b-bottom{
    border-bottom: 1px solid #000;
    font-weight: bolder;
  }
  .loan-input-error{
    border-color: #f55753;
  }
  .signature{
    cursor: ;
  }
  .mt-75{
    margin-top: 75px;
  }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/signature.css')}}">
<style>
    
    .kbw-signature { width: 100%; height: 80px;}
    #sig canvas{ width: 100% !important; height: auto;}
    #sig-chair canvas{ width: 100% !important; height: auto;}
    #sig-member-1 canvas{ width: 100% !important; height: auto;}
    #sig-member-2 canvas{ width: 100% !important; height: auto;}
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
</style>
@endpush

@push('css')
@endpush

@push('content')
<div class="content ">
  <div class=" container-fluid   container-fixed-lg">
    <form action="" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      @if(session()->has('notification-status'))
      <div class="m-t-35 alert alert-{{session()->get('notification-status')}}" role="alert">
          <button class="close" data-dismiss="alert"></button>
          <strong>{{Str::title(session()->get('notification-status'))}}: </strong> {{session()->get('notification-msg')}}
      </div>
      @endif
      @if($loan)
      <input type="hidden" name="id" value="{{$loan->id}}">
      @endif
      <div class="loan-status-div {{$loan?($loan->loan_status == 'rejected'?'loan-rejected':''):''}}">
        <h4><strong>{{$loan?$loan_statuses[$loan->loan_status]:'New Loan Application'}}</strong></h4>
      </div>
      <div class="card card-default m-t-20">
        <div class="card-body">
          <div class="invoice padding-50 sm-padding-10">
              @include('backoffice.pages.loan._components.1_header')
              @include('backoffice.pages.loan._components.2_oath')
              @include('backoffice.pages.loan._components.3_personal_information')
              @include('backoffice.pages.loan._components.4_coborrower_information')
              @include('backoffice.pages.loan._components.5_certify')
              @include('backoffice.pages.loan._components.6_approval')
              @include('backoffice.pages.loan._components.7_disclosure')
              @include('backoffice.pages.loan._components.8_notes')
              @include('backoffice.pages.loan._components.9_footer')
          </div>
        </div>
      </div>
      @if(!$loan)
      <button type="submit" class="btn btn-primary btn-lg">Submit Loan Application</button>
      @else
        @if($loan AND auth()->user()->type == 'credit_committee' AND $loan->loan_status == 'pending')
        <input type="submit" name="submit" value="Approve" class="btn btn-success btn-lg">
        <input type="submit" name="submit" value="Reject" class="btn btn-default btn-lg">
        <input type="submit" name="submit" value="Save" class="btn btn-primary btn-lg pull-right">
        @endif
        @if($loan AND in_array(auth()->user()->type, ['chairman', 'general_manager']) AND $loan->loan_status == 'awaiting_chair_gm')
        <input type="submit" name="submit" value="Approve" class="btn btn-success btn-lg">
        <input type="submit" name="submit" value="Reject" class="btn btn-default btn-lg">
        <input type="submit" name="submit" value="Save" class="btn btn-primary btn-lg pull-right">
        @endif
        @if($loan AND in_array(auth()->user()->type, ['member']) AND $loan->user_id == auth()->user()->id AND $loan->loan_status == 'awaiting_disclosure_statement_approval')
        <input type="submit" name="submit" value="Approve" class="btn btn-success btn-lg">
        @endif
        @if($loan AND in_array(auth()->user()->type, ['credit_committee']) AND $loan->loan_status == 'approved')
        <input type="submit" name="submit" value="Complete" class="btn btn-success btn-lg">
        @endif
      @endif
    </form>
  </div>
</div>
@endpush


@push('included-scripts')
@endpush

@push('js')
<script type="text/javascript">
$(function() {
    $(".page-load").hide();
});
</script>
<script type="text/javascript" src="{{asset('assets/js/signature.js')}}"></script>
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
    var sig_chair = $('#sig-chair').signature({syncField: '#signature-chair', syncFormat: 'PNG'});
    var sig_member_1 = $('#sig-member-1').signature({syncField: '#signature-member-1', syncFormat: 'PNG'});
    var sig_member_2 = $('#sig-member-2').signature({syncField: '#signature-member-2', syncFormat: 'PNG'});
    var sig_cob = $('#sig-cob').signature({syncField: '#signature-cob', syncFormat: 'PNG'});
    var sig_gm = $('#sig-gm').signature({syncField: '#signature-gm', syncFormat: 'PNG'});

    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature").val('');
    });

  $('#clear-chair').click(function(e) {
      e.preventDefault();
      sig_chair.signature('clear');
      $("#signature-chair").val('');
  });

  $('#clear-member-1').click(function(e) {
      e.preventDefault();
      sig_member_1.signature('clear');
      $("#signature-member-1").val('');
  });

  $('#clear-member-2').click(function(e) {
      e.preventDefault();
      sig_member_2.signature('clear');
      $("#signature-member-2").val('');
  });

  $('#clear-cob').click(function(e) {
      e.preventDefault();
      sig_cob.signature('clear');
      $("#signature-cob").val('');
  });

  $('#clear-gm').click(function(e) {
      e.preventDefault();
      sig_chair.signature('clear');
      $("#signature-gm").val('');
  });
  
</script>
@endpush

@push('css')
<style>
    .avatar{
        height: 70px;
        width: 70px;
    }
</style>
@endpush
