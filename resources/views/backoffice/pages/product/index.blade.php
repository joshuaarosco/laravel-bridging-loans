@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' List')

@push('included-styles')
@endpush

@push('css')
<style>
    .add-product-image{
        width: 100%;
        border: 1px dashed #ccc;
        background: transparent;
    }
    .prod-img{
        width: 100px;
        height: 100px;
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
                        <td class="v-align-middle bold" width="15%">Thumbnail</td>
                        <td class="v-align-middle bold" width="20%">Name</td>
                        <td class="v-align-middle bold" width="30%">Description</td>
                        <td class="v-align-middle bold" width="20%">Price</td>
                        <td class="v-align-middle bold" width="15%">Stock</td>
                        <td class="v-align-middle bold" width="20%">Loan Interest</td>
                        <td class="v-align-middle bold text-right" width="15%">Actions</td>
                    </tr>
                    @forelse($products as $index => $product)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td class="v-align-middle"><img src="{{$product->thumbnail()}}" alt="" class="prod-img"></td>
                        <td class="v-align-middle">{{$product->name}}</td>
                        <td> {{ Str::limit($product->description, 25)}} </td>
                        <td> ₱ {{number_format($product->price, 2)}} </td>
                        <td> {{$product->stock}} </td>
                        <td> {{$product->loanType->title}} - {{$product->loanType->interest}}% per {{$product->loanType->rate}}</td>
                        <td class="text-right">
                            <!-- <a
                            class="btn btn-default btn-rounded btn-xs"
                            title="view" href="{{route('backoffice.product.view',$product->id)}}">
                                <i class="fa fa-eye"></i>
                            </a> -->
                            <button
                            class="btn btn-default btn-rounded btn-xs btn-edit"
                            title="Edit" data-id="{{$product->id}}"
                            data-toggle="modal"
                            data-target="#edit">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button
                            class="btn btn-warning btn-rounded btn-xs btn-delete"
                            title="Delete"
                            data-url="{{route('backoffice.product.delete',$product->id)}}"
                            data-toggle="modal"
                            data-target="#delete">
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            No {{Str::lower(Str::plural($title))}} data yet...
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                @if($products->count() > 0)
                <tfoot>
                    <tr>
                        <th colspan="8">
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
    @include('backoffice.pages.product._components.form')
    <div class="clearfix"></div>
    <button class="btn btn-success mr-2" type="submit">Create a new {{Str::lower($title)}}</button>
    <button class="btn btn-warning" data-dismiss="modal">Close</button>
</form>
@endpush

@push('modal-edit')
<form method="POST" action="{{route('backoffice.product.update')}}" enctype="multipart/form-data" id="" role="form" autocomplete="off">
    @csrf
    <input type="hidden" name="id" class="{{Str::lower($title)}}-id">
    <img src="" class="prod-img m-b-10" id="product-img" alt="">
    @include('backoffice.pages.product._components.form')
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
            url: "{{route('backoffice.product.edit')}}",
            data: { _id : id , _token : "{{csrf_token()}}" },
            dataType: "json",
            async: true,
            success: function(data){
                const {
                    id,
                    name,
                    loan_type_id,
                    description,
                    price,
                    stock,
                    thumbnail,
                } = data.datas;
                console.log(data.datas);
                $(".product-id").val(id);
                $(".product-name").val(name);
                $(".product-type").val(loan_type_id);
                $(".product-description").val(description);
                $(".product-price").val(price);
                $(".product-stock").val(stock);
                $(".product-thumbnail").prop('required',false);
                $(".load-modal").hide();
                document.getElementById("product-img").src=thumbnail;
            },
            error: function(error){
                console.log(error);
            }
        });
    });
    $(".btn-create").on("click",function(){
        $(".product-id").val('');
        $(".product-name").val('');
        $(".product-type").val('');
        $(".product-description").val('');
        $(".product-price").val('');
        $(".product-stock").val('');
        $(".product-thumbnail").prop('required',true);
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

