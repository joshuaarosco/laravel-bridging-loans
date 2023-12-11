@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' List')

@push('included-styles')
@endpush

@push('css')
<style>
    .member-img{
        width: 100%!important;
        height: 150px;
    }
</style>
@endpush

@push('content')
<div class="content sm-gutter">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('backoffice.index')}}">Home</a></li>
            <li class="breadcrumb-item active">{{Str::title($title)}} List</li>
        </ol>
        <div class="p-3 bg-white b-1">
            <div class="row">
                <div class="col-md-8 col-xs-6">
                    {{Str::upper($title)}} LIST
                    <div class="pull-right table-btn">
                        {{-- <button class="btn btn-default btn-xs md-hidden mr-1">
                            <i class="fa fa-filter"></i> Filter
                        </button> --}}
                        <button class="btn btn-success btn-create btn-xs md-hidden" data-toggle="modal" data-target="#create">
                            <i class="fa fa-plus"></i> Create
                        </button>
                    </div>
                </div>
                <div class="col-md-2 sm-hidden">
                    {{-- <button class="btn btn-default btn-block btn-xs table-btn">
                        <i class="fa fa-filter"></i>&nbsp;Filter
                    </button> --}}
                </div>
                <div class="col-md-2 sm-hidden">
                    <button class="btn btn-success btn-create btn-block btn-xs table-btn" data-toggle="modal" data-target="#create">
                        <i class="fa fa-plus"></i>&nbsp;Create
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover table-condensed" id="condensedTable">
                <tbody>
                    <tr>
                        <td class="v-align-middle bold" width="5%">#</td>
                        <td class="v-align-middle bold" width="20%">Name</td>
                        <td class="v-align-middle bold" width="15%">Status</td>
                        <td class="v-align-middle bold" width="30%">Contact Details</td>
                        <td class="v-align-middle bold" width="20%">Share Capital</td>
                        <td class="v-align-middle bold text-right" width="15%">Actions</td>
                    </tr>
                    @forelse($members as $index => $user)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td class="v-align-middle">{{$user->fname}} {{$user->mname}} {{$user->lname}}</td>
                        <td> <span class="label label-{{$user->member->active == 1?'success':'warning'}} m-l-5 inline">{{$user->member->active == 1?'ACTIVE':'INACTIVE'}} </span></td>
                        <td> {{$user->email}} | {{$user->contact_number}} </td>
                        <td>₱ {{ $user->shareCapital? number_format($user->shareCapital->share_capital, 2):'0.00' }}</td>
                        <td class="text-right">
                            <!-- <a
                            class="btn btn-default btn-rounded btn-xs"
                            title="view" href="{{route('backoffice.user.view',$user->id)}}">
                                <i class="fa fa-eye"></i>
                            </a> -->
                            <button
                            class="btn btn-default btn-rounded btn-xs btn-edit"
                            title="Edit" data-id="{{$user->id}}"
                            data-toggle="modal"
                            data-target="#edit">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <!-- <button
                            class="btn btn-warning btn-rounded btn-xs btn-delete"
                            title="Delete"
                            data-url="{{route('backoffice.user.delete',$user->id)}}"
                            data-toggle="modal"
                            data-target="#delete">
                                <i class="fa fa-times"></i>
                            </button> -->
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No {{Str::lower(Str::plural($title))}} data yet...
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                @if($members->count() > 0)
                <tfoot>
                    <tr>
                        <th colspan="5">
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

@push('modal-create')
<form method="POST" action="" id="form-personal" enctype="multipart/form-data" role="form" autocomplete="off">
    @csrf
    @include('backoffice.pages.user._components.new_member_form')
    <div class="clearfix"></div>
    <button class="btn btn-success mr-2" type="submit">Create a new {{Str::lower($title)}}</button>
    <button class="btn btn-warning" data-dismiss="modal">Close</button>
</form>
@endpush

@push('modal-edit')
<form method="POST" action="{{route('backoffice.user.update_member')}}" enctype="multipart/form-data" id="" role="form" autocomplete="off">
    @csrf
    <input type="hidden" name="id" class="{{Str::lower($title)}}-id">
    @include('backoffice.pages.user._components.member_form')
    <div class="clearfix"></div>
    <button class="btn btn-success mr-2" type="submit">Save</button>
    <button class="btn btn-warning" data-dismiss="modal">Close</button>
</form>
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
    $(".btn-edit").on("click",function(){
        $(".load-modal").show();
        let id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "{{route('backoffice.user.edit_member')}}",
            data: { _id : id , _token : "{{csrf_token()}}" },
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
                $(".member-id").val(id);
                // $(".member-type").val(type);

                // document.getElementById("coe-img").src=coe;
                // document.getElementById("bc-img").src=bc;
                // document.getElementById("lp-img").src=lp;
                // document.getElementById("id-img").src=id_pic;
                // document.getElementById("fee-img").src=fee;
                $(".coe-img").attr('href', coe);
                $(".bc-img").attr('href', bc);
                $(".lp-img").attr('href', lp);
                $(".id-img").attr('href', id);
                $(".fee-img").attr('href', fee);
                $("#member-email").text(email);
                $("#member-fname").text(fname);
                $("#member-mname").text(mname);
                $("#member-lname").text(lname);
                $("#member-address").text(address);
                $("#member-date_employed").text(date_employed);
                $("#member-position").text(position);
                $("#member-spouse").text(spouse);
                $("#member-bdate").text(birthdate);
                $("#member-age").text(age);
                $("#member-employer").text(employer);
                $("#member-monthly_salary").text(monthly_salary);
                $("#member-employment_status").text(lname);
                $("#member-no_of_dependents").text(no_of_dependents);
                $("#member-contact_number").text(contact_number);
                if(active == 1){
                    $('#defaultCheck').prop('checked', true);
                }else{
                    $('#defaultCheck').prop('checked', false);
                }
                $(".load-modal").hide();
            },
            error: function(error){
                console.log(error);
            }
        });
    });
    $(".btn-create").on("click",function(){
        $(".user-id").val('');
        $(".user-fname").val('');
        $(".user-mname").val('');
        $(".user-lname").val('');
        $(".user-email").val('');
        $(".user-contact_number").val('');
        $(".load-modal").hide();
    });
    $(".btn-delete").on("click",function(){
        $(".continue-delete").attr("href",$(this).data('url'));
    });
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

