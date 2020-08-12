<div class="form-group">
<label for="rate">Rate</label>
<input type="number" required class="form-control" name='rate' id="rate" 
    value="{{ old('rate', $billing_rate->rate) }}" placeholder="Rate" @if($disabled) disabled @endif>
    @if($errors->has('rate'))
        <span class="text-danger">{{ $errors->first('rate') }}</span>
    @endif
</div>
<div class="form-group">
<label for="wef">Wef</label>
<input type="text" class="form-control dmy" name='wef' id="wef"
    value="{{ old('wef', optional($billing_rate->wef)->format('d-m-Y')) }}" placeholder="Wef" @if($disabled) disabled @endif>
    @if($errors->has('wef'))
        <span class="text-danger">{{ $errors->first('wef') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="description">Description</label>
    <input type="text" required class="form-control" name='description'
    value="{{ old('description', $billing_rate->description) }}" 
    id="description" @if($disabled) disabled @endif placeholder="Description">
    @if($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
</div>