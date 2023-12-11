<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('title')?'has-error':null}}">
            <label>Title</label>
            <input type="text" class="form-control {{Str::lower($title)}}-title" name="title" value="{{old('title')}}" id="title" placeholder="" maxlength="30" required>
            @if($errors->has('title'))
            <label class="error" for="title">{{$errors->first('title')}}</label>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('interest')?'has-error':null}}">
            <label>Interest</label>
            <input type="decimal" min="0" class="form-control {{Str::lower($title)}}-interest" name="interest" value="{{old('interest')}}" id="interest" placeholder="" maxlength="30" required>
            @if($errors->has('interest'))
            <label class="error" for="interest">{{$errors->first('interest')}}</label>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('rate')?'has-error':null}}">
            <label>Rate</label>
            <select class="form-control {{Str::lower($title)}}-rate" name="rate" id="rate" required>
                <option value="">---</option>
                @foreach ($rates as $index => $rate)
                    <option value="{{$index}}">{{$rate}}</option>
                @endforeach
            </select>
            @if($errors->has('rate'))
            <label class="error" for="rate">{{$errors->first('rate')}}</label>
            @endif
        </div>
    </div>
</div>