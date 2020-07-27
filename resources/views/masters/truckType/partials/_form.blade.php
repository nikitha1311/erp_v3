<div class="form-group m-form__group">
    <label for="name">Name</label>
    <input required type="text" class="form-control m-input" id="name" name="name"
           placeholder="Name"  value="{{ old('name', $trucks->name) }}" required @if($disabled) disabled @endif>
    @if($errors->has('name'))
        <span class=" text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>
