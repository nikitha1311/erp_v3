<div class="form-group">
    <label for="formatted_address">Formatted Address</label>
    <input type="text" class="form-control m-input" id="formatted_address" name="formatted_address" placeholder="Formatted_address"
           value="{{ old('formatted_address', $location->formatted_address) }}" required @if($disabled) disabled @endif>
    @if($errors->has('formatted_address'))
        <span class="text-danger">{{ $errors->first('formatted_address') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="locality">Locality</label>
    <input type="text" class="form-control m-input" id="locality" name="locality" placeholder="Locality"
           value="{{ old('locality', $location->locality) }}" required @if($disabled) disabled @endif>
    @if($errors->has('locality'))
        <span class="text-danger">{{ $errors->first('locality') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="district">District</label>
    <input type="text" min="0000000000" class="form-control" id="district" name="district"
           placeholder="District" value="{{ old('district', $location->district) }}" @if($disabled) disabled @endif>
    @if($errors->has('district'))
        <span class="text-danger">{{ $errors->first('district') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="state">State</label>
    <input type="text" min="0000000000" class="form-control" id="state" name="state"
           placeholder="State" value="{{ old('state', $location->state) }}" @if($disabled) disabled @endif>
@if($errors->has('state'))
        <span class="text-danger">{{ $errors->first('state') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="postal_code">Postal Code</label>
    <input type="number" min="0000000000" class="form-control" id="postal_code" name="postal_code"
           placeholder="Postal Code" value="{{ old('postal_code', $location->postal_code) }}" @if($disabled) disabled @endif>

@if($errors->has('postal_code'))
        <span class="text-danger">{{ $errors->first('postal_code') }}</span>
    @endif
</div>
