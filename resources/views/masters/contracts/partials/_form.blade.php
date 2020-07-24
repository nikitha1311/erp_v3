<div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" id="description" 
        value="{{ $contract->description }}"  @if($disabled) disabled @endif required placeholder="Description" >
        @if($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
</div>
<div class="form-group">
    <label for="signed_at">Signed at</label>
    <input type="text" class="form-control" id="signed_at" name='signed_at' 
    @if($disabled) disabled @endif placeholder="Signed at" value="{{ $contract->signed_at }}" autocomplete="off">
</div>
<div class="form-group">
    <label for="valid_till">Valid Till</label>
    <input type="text" class="form-control" name="valid_till" id="valid_till"
    @if($disabled) disabled @endif placeholder="valid till" value="{{ $contract->valid_till }}" >
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control" @if($disabled) disabled @endif>
            <option value="1" selected>Valid</option>
            <option value="0">Invalid</option>
    </select>
    @if($errors->has('status'))
        <span class="text-danger">{{ $errors->first('status') }}</span>
    @endif
</div>