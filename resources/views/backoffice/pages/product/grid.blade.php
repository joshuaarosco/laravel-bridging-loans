@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' Grid')

@push('included-styles')
<link href="{{asset('assets/plugins/jquery-metrojs/MetroJs.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/codrops-dialogFx/dialog.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/codrops-dialogFx/dialog-sandra.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/owl-carousel/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('assets/plugins/jquery-nouislider/jquery.nouislider.css')}}" rel="stylesheet" type="text/css" media="screen" />
@endpush

@push('css')
@endpush

@push('content')
<div class="content sm-gutter">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('backoffice.index')}}">Home</a></li>
            <li class="breadcrumb-item active">{{Str::title($title)}} Grid</li>
        </ol>
        <!-- START CATEGORY -->
        <div class="gallery">
            <!-- <div class="gallery-filters p-t-20 p-b-10">
            <ul class="list-inline text-right">
                <li class="hint-text">Sort by: </li>
                <li><a href="#" class="active text-color p-r-5 p-l-5">Name</a></li>
                <li><a href="#" class="text-color hint-text p-r-5 p-l-5">Views</a></li>
                <li><a href="#" class="text-color hint-text p-r-5 p-l-5">Cost</a></li>
                <li>
                <button aria-label="" class="btn btn-primary m-l-10" data-toggle="filters">More filters</button>
                </li>
            </ul>
            </div> -->
            @foreach($products as $index => $product)
            <div class="gallery-item first" data-width="1" data-height="1" data-id="#itemDetails{{$index}}">
                <img src="{{asset($product->thumbnail())}}" alt="" class="image-responsive-height">
                <!-- END PREVIEW -->
                <!-- START ITEM OVERLAY DESCRIPTION -->
                <div class="overlayer bottom-left full-width">
                    <div class="overlayer-wrapper item-info ">
                        <div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
                            <div class="">
                                <p class="pull-left bold text-white fs-14 p-t-10">{{Str::limit($product->name, 10)}}</p>
                                <h5 class="pull-right semi-bold text-white font-montserrat bold">₱ {{number_format($product->price, 2)}}</h5><div class="clearfix"></div>
                            </div>
                            <div class="m-t-10 m-b-10">
                                <div class="inline">
                                    <p class="no-margin text-white fs-12">Stock: {{$product->stock}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PRODUCT OVERLAY DESCRIPTION -->
            </div>
            @endforeach
            
        </div>
        <!-- END CATEGORY -->
    </div>

    <!-- START DIALOG -->
    @foreach($products as $index => $product)
    <div id="itemDetails{{$index}}" class="dialog item-details">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
            <div class="container-fluid">
                <div class="row dialog__overview">
                    <div class="col-md-7 no-padding item-slideshow-wrapper full-height">
                        <div class="item-slideshow full-height owl-carousel">
                            <div class="slide" data-image="{{asset($product->thumbnail())}}">
                            </div>
                            <!-- <div class="slide" data-image="{{asset('assets/img/gallery/item-square.jpg')}}">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-5 p-r-35 p-t-35 p-l-35 full-height item-description bg-info-dark text-white">
                        <h2 class="semi-bold font-montserrat m-b-20 text-white">{{$product->name}}</h2>
                        <p class="fs-13 text-white">{{$product->description}}</p>
                        <div class="row m-b-20 m-t-20">
                            <div class="col-12 col-xs-height col-middle no-padding">
                                <h2 class="bold price font-montserrat text-white">₱ {{number_format($product->price, 2)}}</h2>
                                <p class="text-white font-montserrat"> {{$product->loanType->title}} - {{$product->loanType->interest}}% per {{$product->loanType->rate}}</p>
                            </div>
                        </div>
                        <a href="{{route('backoffice.profile.loan.application', ['type_id' => $product->loan_type_id, 'oath_5' => $product->price*$product->loanType->interest, 'oath_1' => $product->price, 'oath_6' => $product->loanType->interest])}}" aria-label="" class="btn btn-primary buy-now">Request for a loan</a>
                    </div>
                </div>
                <button aria-label="" class="close action top-right text-white" data-dialog-close><i class="pg-close fs-14"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach
    <!-- END DIALOG -->
    
</div>
@endpush

@push('included-scripts')
<script src="{{asset('assets/plugins/jquery-metrojs/MetroJs.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-isotope/isotope.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/codrops-dialogFx/dialogFx.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-nouislider/jquery.nouislider.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-nouislider/jquery.liblink.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/gallery.js')}}" type="text/javascript"></script>
@endpush

@push('js')
<script type="text/javascript">
$(function() {
    $(".page-load").hide();

    
    $('body').on('click', '.gallery-item', function() {
        var itemDetails = $(this).data('id');

        var dlg = new DialogFx($(itemDetails).get(0));
        
        dlg.toggle();
    });
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
