<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control m-input" id="name" name="name" placeholder="Name"
           value="{{ old('name', $vendor->name) }}" required @if($disabled) disabled @endif>
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control m-input" id="phone" name="phone" placeholder="Phone"
           value="{{ old('phone', $vendor->phone) }}" required @if($disabled) disabled @endif>
    @if($errors->has('phone'))phone
        <span class="text-danger">{{ $errors->first('phone') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="company name">Company Name</label>
    <input type="text" min="0000000000" class="form-control" id="company_name" name="company_name"
           placeholder="Company name" value="{{ old('company_name', $vendor->company_name) }}" @if($disabled) disabled @endif>
    @if($errors->has('company_name'))
        <span class="text-danger">{{ $errors->first('company_name') }}</span>
    @endif
</div>

{{-- <div class="form-group">
   <label for="current_outstanding">Outstanding</label>
   <input type="text" min="0000000000" class="form-control" id="current_outstanding" name="current_outstanding"
          placeholder="Current outstanding" value="{{ old('current_outstanding', $vendor->current_outstanding) }}" @if($disabled) disabled @endif>
@if($errors->has('current_outstanding'))
       <span class="text-danger">{{ $errors->first('current_outstanding') }}</span>
   @endif
</div> --}}
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" min="0000000000" class="form-control" id="address" name="address"
           placeholder="Address" value="{{ old('address', $vendor->address) }}" @if($disabled) disabled @endif>
@if($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="remarks">Remarks</label>
    <input type="text" min="0000000000" class="form-control" id="remarks" name="remarks"
           placeholder="Remarks" value="{{ old('remarks', $vendor->remarks) }}" @if($disabled) disabled @endif>
@if($errors->has('remarks'))
        <span class="text-danger">{{ $errors->first('remarks') }}</span>
    @endif
</div>
