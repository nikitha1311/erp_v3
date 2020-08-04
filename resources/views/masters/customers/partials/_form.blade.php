<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name"id="name"  placeholder="Name"
        value="{{ old('name', $customer->name) }}" required @if($disabled) disabled @endif>
      @if($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif
  </div>
  <div class="form-group">
    <label for="code">Code</label>
    <input type="text" class="form-control" name="code"id="code" placeholder="Code"
        value="{{ old('code', $customer->code) }}" required @if($disabled) disabled @endif>

      @if($errors->has('code'))
          <span class="text-danger">{{ $errors->first('code') }}</span>
      @endif
  </div>
  <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" name="address" id="address" 
      value="{{ old('address', $customer->address) }}" placeholder="Address" required @if($disabled) disabled @endif>

      @if($errors->has('address'))
          <span class="text-danger">{{ $errors->first('address') }}</span>
      @endif
    </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="is_consignor"
        @if ($customer->is_consignor) != 0 ?? checked @endif  name="is_consignor" @if($disabled) disabled @endif>
    <label class="form-check-label" for="is_consignor">Consignor</label>
  </div>
  <div class="form-check">
      <input type="checkbox" class="form-check-input" id="is_consignee" 
      @if ($customer->is_consignee) != 0 ?? checked @endif name="is_consignee" @if($disabled) disabled @endif>
      <label class="form-check-label" for="is_consignee">Consignee</label>
  </div>
  <div class="form-check">
      <input type="checkbox" class="form-check-input" id="is_billed_on"
      @if ($customer->is_billed_on) != 0 ?? checked @endif  name="is_billed_on" @if($disabled) disabled @endif>
      <label class="form-check-label" for="is_billed_on">Is Billed On</label>
  </div>