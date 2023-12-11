@extends('backoffice._layout.main',['data_table' => true])

@push('title',$title.' Details')

@push('included-styles')
<link href="{{asset('assets/plugins/dropzone/css/dropzone.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('css')
<style>
    .profile-img-wrapper{
        height: 150px!important;
        width: 150px!important;
    }
    .center{
        display: flex!important;
        justify-content: center!important;
    }
    .m-t-50{
        margin-top: 50px;
    }
    .avatar-upload{
        border: 1px solid rgba(0, 0, 0, 0.07);
        border-radius: 3px;
        padding: 15px;
    }
</style>
@endpush

@push('content')
<div class="content sm-gutter">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('backoffice.index')}}">Home</a></li>
            <li class="breadcrumb-item active">{{Str::title($title)}} Settings</li>
        </ol>
        @if(auth()->user()->type == 'member')
        <div class="card card-transparent">
            <div class="card-body no-padding">
                <div id="card-advance" class="card card-default">
                    <div class="card-header  ">
                        <div class="card-title">Account Details
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>
                            <span class="semi-bold">Personal</span> Information
                        </h3>
                        <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row avatar-upload">
                                                <div class="col-md-5">
                                                    <div class="profile-img-wrapper m-t-5 inline">
                                                        
                                                        @if(auth()->check())
                                                        @if(auth()->user()->type != 'member')
                                                        <img width="150" height="150" data-src-retina="{{asset('assets/img/profiles/avatar_small2x.jpg')}}" 
                                                        data-src="{{asset('assets/img/profiles/avatar_small.jpg')}}" alt="" 
                                                        src="{{asset('assets/img/profiles/avatar_small2x.jpg')}}">
                                                        @else
                                                        @if(auth()->user()->getAvatar()!='/')
                                                        <img width="150" height="150" data-src-retina="{{auth()->user()->getAvatar()}}" 
                                                        data-src="{{auth()->user()->getAvatar()}}" alt="" 
                                                        src="{{auth()->user()->getAvatar()}}">
                                                        @else
                                                        <img width="150" height="150" data-src-retina="{{asset('assets/img/profiles/avatar_small2x.jpg')}}" 
                                                        data-src="{{asset('assets/img/profiles/avatar_small.jpg')}}" alt="" 
                                                        src="{{asset('assets/img/profiles/avatar_small2x.jpg')}}">
                                                        @endif
                                                        @endif
                                                        @else
                                                        <img width="150" height="150" data-src-retina="{{asset('assets/img/profiles/avatar_small2x.jpg')}}" 
                                                        data-src="{{asset('assets/img/profiles/avatar_small.jpg')}}" alt="" 
                                                        src="{{asset('assets/img/profiles/avatar_small2x.jpg')}}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group form-group-default m-t-50 {{$errors->has('file')?'has-error':null}}">
                                                        <label>Avatar</label>
                                                        <input type="file" class="form-control" name="file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="form-group form-group-default required {{$errors->has('fname')?'has-error':null}}">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="fname" value="{{auth()->check()?auth()->user()->fname:'---'}}" required>
                                                        @if($errors->has('fname'))
                                                        <label class="error" for="fname">{{$errors->first('fname')}}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Middle Name</label>
                                                        <input type="text" class="form-control" name="mname" value="{{auth()->check()?auth()->user()->mname:'---'}}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="form-group form-group-default required {{$errors->has('lname')?'has-error':null}}">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="lname" value="{{auth()->check()?auth()->user()->lname:'---'}}" required>
                                                        @if($errors->has('lname'))
                                                        <label class="error" for="lname">{{$errors->first('lname')}}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group form-group-default required {{$errors->has('email')?'has-error':null}}">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{auth()->check()?auth()->user()->email:'---'}}" required>
                                                        @if($errors->has('email'))
                                                        <label class="error" for="email">{{$errors->first('email')}}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Contact Number</label>
                                                        <input type="text" class="form-control" name="contact_number" value="{{auth()->check()?auth()->user()->contact_number:'---'}}">
                                                        @if($errors->has('contact_number'))
                                                        <label class="error" for="contact_number">{{$errors->first('contact_number')}}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-success pull-right" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card card-transparent">
            <div class="card-body no-padding">
                <div id="card-advance" class="card card-default">
                    <div class="card-header  ">
                        <div class="card-title">Security
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>
                            <span class="semi-bold">Password</span> Settings
                        </h3>
                        <br>
                        <form action="{{route('backoffice.account.update_password')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group form-group-default required {{$errors->has('old_password')?'has-error':null}}">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" name="old_password" value="" required>
                                        @if($errors->has('old_password'))
                                        <label class="error" for="old_password">{{$errors->first('old_password')}}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group form-group-default required {{$errors->has('new_password')?'has-error':null}}">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="new_password" value="" required>
                                        @if($errors->has('new_password'))
                                        <label class="error" for="new_password">{{$errors->first('new_password')}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-group-default required {{$errors->has('new_password_confirmation')?'has-error':null}}">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="new_password_confirmation" value="" required>
                                        @if($errors->has('new_password_confirmation'))
                                        <label class="error" for="new_password_confirmation">{{$errors->first('new_password_confirmation')}}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success pull-right" type="submit">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endpush
    
    @push('included-scripts')
    @endpush
    
    @push('js')
    <script src="{{asset('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/form_wizard.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/js/form_elements.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/form_layouts.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        
        $(function() {
            $(".page-load").hide();
        });
    </script>
    @endpush