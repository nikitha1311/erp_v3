<div class="form-group m-form__group">
    <label for="name">Name</label>
    <input required type="text" class="form-control m-input" id="name" name="name"
           placeholder="Name"  value="{{ old('name', $branch->name) }}" required @if($disabled) disabled @endif>
    @if($errors->has('name'))
        <span class=" text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group m-form__group">
    <label for="address">Address</label>
    <input required type="text" class="form-control m-input" id="address" name="address"
           placeholder="Address"  value="{{ old('address', $branch->address) }}" required @if($disabled) disabled @endif>
    @if($errors->has('address'))
        <span class=" text-danger">{{ $errors->first('address') }}</span>
    @endif
</div>
