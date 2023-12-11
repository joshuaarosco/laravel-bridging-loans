@extends('backoffice.auth._layout.main')

@push('title','Login')

@push('css')
<style>
  .login-wrapper {
    background: url({{asset('web/assets/images/coop-bg.jpg')}});
    background-size: cover;
    background-repeat: no-repeat;
    background-position: bottom;
  }
</style>
@endpush

@push('content')
  <div class="login-wrapper">
    <div class="bg-pic">
      {{-- <img alt="" class="lazy" data-src="{{asset('web/assets/images/PSU_banner.jpg')}}" data-src-retina="{{asset('web/assets/images/PSU_banner.jpg')}}" src="{{asset('web/assets/images/PSU_banner.jpg')}}"> --}}
      <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
        <h2 class="semi-bold text-white">{{config('app.name')}}</h2>
        <p class="small"></p>
      </div>
    </div>
    <div class="login-container bg-white">
      <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
        <h3>{{config()->get('app.name')}}</h3>
        <p class="p-t-35">Sign in into your {{config()->get('app.name')}} account.
        @if(session()->has('notification-status'))
        <div class="m-t-35 alert alert-{{session()->get('notification-status')}}" role="alert">
            <button class="close" data-dismiss="alert"></button>
            <strong>{{Str::title(session()->get('notification-status'))}}: </strong> {{session()->get('notification-msg')}}
        </div>
        @endif
        <form action="" method="POST" class="p-t-15" id="form-login" name="form-login" role="form">
          {{csrf_field()}}
          <div class="form-group form-group-default">
            <label>Login</label>
            <div class="controls">
              <input class="form-control" name="username" placeholder="User Name" required="" type="text">
            </div>
          </div>
          <div class="form-group form-group-default">
            <label>Password</label>
            <div class="controls">
              <input class="form-control" name="password" placeholder="Credentials" required="" type="password">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 no-padding sm-p-l-10">
              <div class="checkbox">
                <input name="remember_me" id="checkbox1" type="checkbox" value="1"> <label for="checkbox1">Keep Me Signed in</label>
              </div>
            </div>
          </div>
          <button class="btn btn-success btn-cons m-t-10" type="submit">Sign in</button><br>
        </form>
        <!-- <div class="m-t-10">
          <a href="{{ route('backoffice.auth.sign_up') }}" class="normal">Not a member yet? Signup now.</a>
        </div> -->
      </div>
    </div>
  </div>
@endpush
