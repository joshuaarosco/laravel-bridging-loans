<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('name')?'has-error':null}}">
            <label>Product Name</label>
            <input type="text" class="form-control {{Str::lower($title)}}-name" name="name" value="{{old('name')}}" id="name" placeholder="" maxlength="30" required>
        </div>
        @if($errors->has('name'))
        <label class="error" for="name">{{$errors->first('name')}}</label>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('type')?'has-error':null}}">
            <label>Loan Type</label>
            <select class="form-control {{Str::lower($title)}}-type" name="type" id="type" required>
                <option value="">---</option>
                @foreach ($loanTypes as $index => $type)
                    <option value="{{$type->id}}">{{$type->title}} - {{$type->interest}}% per {{$type->rate}}</option>
                @endforeach
            </select>
            @if($errors->has('type'))
            <label class="error" for="type">{{$errors->first('type')}}</label>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('description')?'has-error':null}}">
            <label>Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control {{Str::lower($title)}}-description" required></textarea>
        </div>
        @if($errors->has('description'))
        <label class="error" for="description">{{$errors->first('description')}}</label>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default required {{$errors->has('price')?'has-error':null}}">
            <label>Price</label>
            <input type="number" min="0" class="form-control {{Str::lower($title)}}-price" name="price" value="{{old('price')}}" id="price" placeholder="" maxlength="30" required>
            @if($errors->has('price'))
            <label class="error" for="price">{{$errors->first('price')}}</label>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default required {{$errors->has('stock')?'has-error':null}}">
            <label>Stock</label>
            <input type="number" min="1" class="form-control {{Str::lower($title)}}-stock" name="stock" value="{{old('stock')}}" id="stock" placeholder="" maxlength="30" required>
            @if($errors->has('stock'))
            <label class="error" for="stock">{{$errors->first('stock')}}</label>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('thumbnail')?'has-error':null}}">
            <label>Thumbnail</label>
            <input type="file" class="form-control {{Str::lower($title)}}-thumbnail" name="thumbnail" value="{{old('thumbnail')}}" id="thumbnail" placeholder="" maxlength="30" required>
        </div>
        @if($errors->has('thumbnail'))
        <label class="error" for="thumbnail">{{$errors->first('thumbnail')}}</label>
        @endif
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default required {{$errors->has('image[]')?'has-error':null}}">
            <label>Image</label>
            <input type="file" class="form-control {{Str::lower($title)}}-image[]" name="image[]" value="{{old('image[]')}}" id="image[]" placeholder="" maxlength="30" required>
        </div>
        <div class="form-group form-group-default required {{$errors->has('image[]')?'has-error':null}}">
            <label>Image</label>
            <input type="file" class="form-control {{Str::lower($title)}}-image[]" name="image[]" value="{{old('image[]')}}" id="image[]" placeholder="" maxlength="30" required>
        </div>
        @if($errors->has('image[]'))
        <label class="error" for="image[]">{{$errors->first('image[]')}}</label>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12 m-b-10">
        <button type="button" class="btn add-product-image">Add Image</button>
    </div>
</div> -->