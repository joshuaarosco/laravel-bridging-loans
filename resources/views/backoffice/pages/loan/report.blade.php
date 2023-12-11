@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title)

@push('included-styles')
@endpush

@push('css')
@endpush

@push('content')
<div class="content sm-gutter">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('backoffice.index')}}">Home</a></li>
            <li class="breadcrumb-item active">{{Str::title($title)}}</li>
        </ol>
        <div class="p-3 bg-white b-1">
            <form action="" method="GET">
            <div class="row">
                <div class="col-md-10 col-xs-6">
                    <p>FILTER {{Str::upper($title)}}</p>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="month" name="start" class="form-control" value="{{Input::has('start')?Input::get('start'):''}}">
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-2">
                                <h6>&nbsp;to</h6>
                                </div>
                                <div class="col-md-10">
                                    <input type="month" name="end" class="form-control" value="{{Input::has('end')?Input::get('end'):''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-md-4">
                            <select name="status" class="form-control" id="">
                                <option value="">---</option>
                                @foreach($loan_statuses as $index => $status)
                                @if(Input::has('status') AND Input::get('status') == $index)
                                <option value="{{$index}}" selected>{{$status}}</option>
                                @else
                                <option value="{{$index}}">{{$status}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 sm-hidden">
                    <p>&nbsp;</p>
                    <button class="btn btn-default btn-block table-btn" type="submit">
                        <i class="fa fa-filter"></i>&nbsp;Show
                    </button>
                </div>
            </div>
            </form>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-condensed" id="condensedTable">
                <tbody>
                    <tr>
                        <td class="v-align-middle bold" width="5%">#</td>
                        <td class="v-align-middle bold" width="20%">PB#</td>
                        <td class="v-align-middle bold" width="20%">Applicant</td>
                        <td class="v-align-middle bold" width="20%">Type</td>
                        <td class="v-align-middle bold" width="15%">Created Date</td>
                        <td class="v-align-middle bold" width="15%">Status</td>
                    </tr>
                    @forelse($loans as $index => $loan)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td> <a href="{{route('backoffice.loan.view',$loan->id)}}" class="text-success">{{$loan->pb_no}}</a> </td>
                        <td class="v-align-middle">{{$loan->applicant}}</td>
                        <td> {{$loan->loanType->title}} </td>
                        <td> {{date_format($loan->created_at,'Y-m-d')}} </td>
                        <td> {{$loan_statuses[$loan->loan_status]}} </td>
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
@endpush

@push('modal-view')
@endpush


@push('modal-delete')
<i class="pg pg-trash_line big-icon"></i>
<h5>You are about to <span class="semi-bold text-danger">delete</span> a <span class="semi-bold text-success">{{Str::lower($title)}}</span>, do you want to proceed?</h5>
<br>
<a href="" class="btn btn-success btn-block continue-delete">Continue</a>
<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
@endpush

@push('included-scripts')
@endpush

@push('js')
<script type="text/javascript">
$(function() {
    $(".page-load").hide();
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

