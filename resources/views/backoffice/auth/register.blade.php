@extends('backoffice.auth._layout.main')

@push('title','Membership Application')

@push('css')
<style>
  .card .card-header{
    padding: 17px 20px 7px;
  }
  .checkbox {
    margin-bottom: 0px;
    margin-top: 0px;
  }
</style>
@endpush

@push('content')
    <div class="register-container full-height sm-p-t-30">
      <div class="d-flex justify-content-center flex-column full-height ">
        <h3>Membership Application</h3>
        <div class="card card-default m-b-0">
          <div class="card-header " role="tab" id="headingThree">
            <div class="card-title">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Make sure to pass the following criteria:
              </a>
            </div>
          </div>
          <div id="collapseThree" class="collapse" role="tabcard" aria-labelledby="headingThree">
            <ol style="list-style-type:lower-alpha; padding-right: 15px; padding-bottom: 15px;">
              <li>Any natural persons who are Filipino citizens, legal age, with the capacity to contract & possess all the qualification provided for in the By-Laws.</li>
              <li>Active and retired employees of the PSU.</li>
              <li>Completes the prescribed Pre-membership Education Seminar (PMES) from the Education and Training Committee.</li>
              <li>Subscribes and pays the required minimum share capital and membership fee.</li>
              <li>Undertakes to uphold the By-Laws, policies, guidelines, rules and regulations promulgated by the BOD and the general assembly.</li>
              <li>Makes use of the services and other allied services.</li>
              <li>Submit the following papers and documents upon registration.</li>
            </ol>
          </div>
        </div>
        <form id="form-register" class="p-t-15" role="form" action="" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-4">
              <div class="form-group form-group-default required {{$errors->has('fname')?'has-error':null}}">
                <label>First Name</label>
                <input type="text" name="fname" value="{{old('fname')}}" placeholder="Juan" class="form-control" required>
              </div>
              @if($errors->has('fname'))
              <label class="error" for="fname">{{$errors->first('fname')}}</label>
              @endif
            </div>
            <div class="col-md-4">
              <div class="form-group form-group-default">
                <label>Middle Name</label>
                <input type="text" name="mname" value="{{old('mname')}}" placeholder="Ponce" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group form-group-default required {{$errors->has('lname')?'has-error':null}}">
                <label>Last Name</label>
                <input type="text" name="lname" value="{{old('lname')}}" placeholder="Dela Cruz" class="form-control" required>
              </div>
            </div>
              @if($errors->has('lname'))
              <label class="error" for="lname">{{$errors->first('lname')}}</label>
              @endif
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('contact_number')?'has-error':null}}">
                <label>Contact Number</label>
                <input type="tel" name="contact_number" value="{{old('contact_number')}}" placeholder="09123456789" class="form-control" required>
              </div>
              @if($errors->has('contact_number'))
              <label class="error" for="contact_number">{{$errors->first('contact_number')}}</label>
              @endif
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('email')?'has-error':null}}">
                <label>Email</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="We will send loging details to you" class="form-control" required>
              </div>
              @if($errors->has('email'))
              <label class="error" for="email">{{$errors->first('email')}}</label>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required {{$errors->has('password_confirmation')?'has-error':null}}">
                <label>Password</label>
                <input type="password" name="password_confirmation" placeholder="Minimum of 8 Charactors" class="form-control" required>
              </div>
              @if($errors->has('password_confirmation'))
              <label class="error" for="password_confirmation">{{$errors->first('password_confirmation')}}</label>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required {{$errors->has('password')?'has-error':null}}">
                <label>Confirm Password</label>
                <input type="password" name="password" placeholder="Minimum of 8 Charactors" class="form-control" required>
              </div>
              @if($errors->has('password'))
              <label class="error" for="password">{{$errors->first('password')}}</label>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('bc')?'has-error':null}}">
                <label>Copy of Birth Certificate</label>
                <input type="file" name="bc" class="form-control" required>
              </div>
              @if($errors->has('bc'))
              <label class="error" for="bc">{{$errors->first('bc')}}</label>
              @endif
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('id')?'has-error':null}}">
                <label>2"x2" ID picture</label>
                <input type="file" name="id" class="form-control" required>
              </div>
              @if($errors->has('id'))
              <label class="error" for="id">{{$errors->first('id')}}</label>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('coe')?'has-error':null}}">
                <label>Certificate of Employment</label>
                <input type="file" name="coe" class="form-control" required>
              </div>
              @if($errors->has('coe'))
              <label class="error" for="coe">{{$errors->first('coe')}}</label>
              @endif
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default required {{$errors->has('lp')?'has-error':null}}">
                <label>Copy of Latest Payslip</label>
                <input type="file" name="lp" class="form-control" required>
              </div>
              @if($errors->has('lp'))
              <label class="error" for="lp">{{$errors->first('lp')}}</label>
              @endif
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <p>Visit the <a href="https://invoice-staging.xendit.co/od/multi-pce" target="_blank">Payment Link</a> and attach the successful payment screenshot to pay the Membership Application Fee 
                <a href="https://invoice-staging.xendit.co/od/multi-pce" target="_blank">https://invoice-staging.xendit.co/od/multi-pce</a>.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default required {{$errors->has('fee')?'has-error':null}}">
                <label>Membership fee proof of payment screenshot</label>
                <input type="file" name="fee" class="form-control" required>
              </div>
              @if($errors->has('fee'))
              <label class="error" for="fee">{{$errors->first('fee')}}</label>
              @endif
            </div>
          </div>
          <p><small>Pay the membership fee amounting P100 and initial fee of P300 for mutual aid fund.</small></p>
          <div class="row">
            <div class="col-md-12 no-padding sm-p-l-10">
              <div class="checkbox">
                <input name="agree" id="agree" type="checkbox" value="1" required> 
                <label for="agree">
                  <p>
                    <small>I agree to the 
                      <a href="https://cda.gov.ph/wp-content/uploads/2021/01/SERVICE-BYLAWS.pdf" target="_blank" class="text-info">By-laws, policies, guidelines, rules and regulations promulgated by the. Board of Directors and the general assembly</a>.
                    </small>
                  </p>
                </label>
              </div>
            </div>
          </div>
          <button aria-label="" class="btn btn-success btn-cons m-t-10" type="submit">Create a new account</button>
          <div class="m-t-10">
            <a href="{{ route('backoffice.auth.login') }}" class="normal">Already a member? Login now.</a>
          </div>
        </form>
      </div>
    </div>
@endpush