@extends('backoffice._layout.main',['data_table' => true])

@push('title','Dashboard')

@push('included-styles')
<!-- <link href="{{asset('assets/plugins/nvd3/nv.d3.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/mapplic/css/mapplic.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/rickshaw/rickshaw.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css" media="screen">
<link href="{{asset('assets/plugins/jquery-metrojs/MetroJs.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/codrops-dialogFx/dialog.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/codrops-dialogFx/dialog-sandra.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/owl-carousel/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/jquery-nouislider/jquery.nouislider.css')}}" rel="stylesheet" type="text/css" media="screen" /> -->
<style>
	.widget-2:after {
		background-image: url("{{asset('web/assets/images/PSU_dashboard.jpg')}}")!important;
	}
	.widget-1:after {
		background-image: url("{{asset('web/assets/images/PSU_graduates.jpg')}}")!important;
	}
	.card.full-height {
		height: unset!important;
	}
	.full-height {
		height: unset!important;
	}
	.m-t-3{
		margin-top: 3px;
	}
</style>
@endpush

@push('content')
<div class="content sm-gutter">
	<div class="container-fluid padding-25 sm-padding-10">
		@if(auth()->user()->type == 'member')
		<div class="row">
			<div class="col-md-{{auth()->user()->type == 'member'?'3':'6'}} text-center">
				<div class="card">
					<div class="card-header">
						<h4>Total Loans Paid</h4>
					</div>
					<div class="card-body">
						<h5>₱ {{number_format($loansPaid, 2)}}</h5>
					</div>
				</div>
			</div>
			<div class="col-md-{{auth()->user()->type == 'member'?'3':'6'}} text-center">
				<div class="card">
					<div class="card-header">
						<i></i>
						<h4>Total Loan Balance</h4>
					</div>
					<div class="card-body">
						<h5>₱ {{number_format($loanBalance, 2)}}</h5>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center">
				<div class="card">
					<div class="card-header">
						<h4>Next Due Date</h4>
					</div>
					<div class="card-body">
						<h5>{{ $nextDueDate?:'No Active loan to be paid.' }}</h5>
					</div>
				</div>
			</div>
			<div class="col-md-3 text-center">
				<div class="card">
					<div class="card-header">
						<i></i>
						<h4>Share Capital</h4>
					</div>
					<div class="card-body">
						<h5>₱ {{number_format($shareCapital, 2)}}</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		@if($pendingLoan)
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<i></i>
						<h4>Pending Loan Waiting for Approval</h4>
					</div>
					<div class="card-body">
						<h5>PB No: <a href="{{route('backoffice.profile.loan.current')}}">{{$pendingLoan->pb_no}}</a></h5>
					</div>
					<div class="card-footer">
						<a href="{{route('backoffice.profile.loan.current')}}" class="btn btn-default">View</a>
						<a href="{{route('backoffice.profile.loan.cancel', $pendingLoan->id)}}" class="btn btn-warning pull-right">Cancel</a>
					</div>
				</div>
			</div>
		@endif
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<h4> Awaiting For Approval Loans ( Co-Borrower )</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-condensed" id="condensedTable">
								<tbody>
									<tr>
										<td class="v-align-middle bold" width="5%">#</td>
										<td class="v-align-middle bold" width="20%">PB#</td>
										<td class="v-align-middle bold" width="20%">Applicant</td>
										<td class="v-align-middle bold" width="20%">Type</td>
										<td class="v-align-middle bold" width="15%">Status</td>
										<td class="v-align-middle bold text-right" width="15%">Actions</td>
									</tr>
									@forelse($awaiting_approval_loans as $index => $loan)
									@if(($loan->co1_id == auth()->user()->id AND $loan->co1_status == 'pending') 
									|| ($loan->co2_id == auth()->user()->id AND $loan->co2_status == 'pending'))
									<tr>
										<td>{{$index+1}}</td>
										<td> <a href="{{route('backoffice.loan.view',$loan->id)}}" class="text-success">{{$loan->pb_no}}</a> </td>
										<td class="v-align-middle">{{$loan->applicant}}</td>
										<td> {{$loan->loanType->title}} </td>
										<td> {{$loan_statuses[$loan->loan_status]}} </td>
										<td class="text-right">
											<a
											class="btn btn-default btn-rounded btn-xs"
											title="view" href="{{route('backoffice.loan.view',$loan->id)}}">
												<i class="fa fa-eye"></i>
											</a>
										</td>
									</tr>
									@endif
									@empty
									<tr>
										<td colspan="6" class="text-center">
											No {{Str::lower(Str::plural($title))}} data yet...
										</td>
									</tr>
									@endforelse
								</tbody>
								@if($loans->count() > 0)
								<tfoot>
									<tr>
										<th colspan="6">
											<div class="row">
												<div class="col-md-12">

												</div>
											</div>
										</th>
									</tr>
								</tfoot>
								@endif
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="card">
			<div class="card-header">
				<h4>Current Loans</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover table-condensed" id="condensedTable">
						<tbody>
							<tr>
								<td class="v-align-middle bold" width="5%">#</td>
								<td class="v-align-middle bold" width="20%">PB#</td>
								<td class="v-align-middle bold" width="20%">Applicant</td>
								<td class="v-align-middle bold" width="20%">Type</td>
								<td class="v-align-middle bold" width="15%">Status</td>
								<td class="v-align-middle bold text-right" width="15%">Actions</td>
							</tr>
							@forelse($loans as $index => $loan)
							<tr>
								<td>{{$index+1}}</td>
								<td> <a href="{{route('backoffice.loan.view',$loan->id)}}" class="text-success">{{$loan->pb_no}}</a> </td>
								<td class="v-align-middle">{{$loan->applicant}}</td>
								<td> {{$loan->loanType->title}} </td>
								<td> {{$loan_statuses[$loan->loan_status]}} </td>
								<td class="text-right">
									<a
									class="btn btn-default btn-rounded btn-xs"
									title="view" href="{{route('backoffice.loan.view',$loan->id)}}">
										<i class="fa fa-eye"></i>
									</a>
									<button
										class="btn btn-warning btn-rounded btn-xs btn-delete"
										title="Delete"
										data-url="{{route('backoffice.loan.delete',$loan->id)}}"
										data-toggle="modal"
										data-target="#delete">
										<i class="fa fa-times"></i>
									</button>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="6" class="text-center">
									No {{Str::lower(Str::plural($title))}} data yet...
								</td>
							</tr>
							@endforelse
						</tbody>
						@if($loans->count() > 0)
						<tfoot>
							<tr>
								<th colspan="6">
									<div class="row">
										<div class="col-md-12">

										</div>
									</div>
								</th>
							</tr>
						</tfoot>
						@endif
					</table>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
@endpush

@push('included-scripts')
<!-- <script src="{{asset('assets/plugins/nvd3/lib/d3.v3.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/nvd3/nv.d3.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/nvd3/src/utils.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/nvd3/src/tooltip.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/nvd3/src/interactiveLayer.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/nvd3/src/models/axis.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/nvd3/src/models/line.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/nvd3/src/models/lineWithFocusChart.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/mapplic/js/hammer.min.js')}}"></script>
<script src="{{asset('assets/plugins/mapplic/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/plugins/mapplic/js/mapplic.js')}}"></script>
<script src="{{asset('assets/plugins/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-metrojs/MetroJs.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/skycons/skycons.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/dashboard.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-isotope/isotope.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/codrops-dialogFx/dialogFx.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-nouislider/jquery.nouislider.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-nouislider/jquery.liblink.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/gallery.js')}}" type="text/javascript"></script> -->
@endpush

@push('modal-delete')
<i class="pg pg-trash_line big-icon"></i>
<h5>You are about to <span class="semi-bold text-danger">delete</span> a <span class="semi-bold text-success">Loan Application</span>, do you want to proceed?</h5>
<br>
<a href="" class="btn btn-success btn-block continue-delete">Continue</a>
<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
@endpush

@push('js')
<script type="text/javascript">
	$(function() {
		$(".page-load").hide();
	});
</script>
<script type="text/javascript">
$(function() {

	$(".btn-delete").on("click",function(){
        $(".continue-delete").attr("href",$(this).data('url'));
    });

});
</script>
@endpush
