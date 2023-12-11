<div class="row">
    <div class="col-sm-3">
        <img src="{{asset('assets/images/coop-logo.jpeg')}}" class="loan-logo" alt="">
    </div>
    <div class="col-sm-6">
        <h6 class="text-center loan-text">PSU MULTI-PURPOSE COOPERATIVE <br>
        PSU Main Campus, Lingayen, Pangasinan
        </h6>
    </div>
    <div class="col-sm-3">
        <div class="green-box-header">
            <address class="fw-500">PB#
                <input class="loan-input green-box-input w-80" name="pb_no" type="text" value="{{ $loan?$loan->pb_no:old('pb_no', $pb_no) }}" readonly/>
            </address>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h6 class="m-t-10 text-center loan-text fw-500">LOAN APPLICATION</h6>
    </div>
</div>