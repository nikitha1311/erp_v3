<div class="form-group">
    <label for="from_id">From</label>
    <select class="form-control" id="from_id" name="from_id" @if($disabled) disabled @endif>
        @foreach($locations as $location)
            <option @if($route->from_id == $location->id) selected
                @endif value="{{ $location->id }}">{{ $location->district }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="to_id">To</label>
    <select class="form-control" id="to_id" name="to_id" @if($disabled) disabled @endif>
        @foreach($locations as $location)
            <option @if($route->to_id == $location->id) selected
                @endif value="{{ $location->id }}">{{ $location->district }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="truck_type_id">Truck Type</label>
    <select class="form-control" id="truck_type_id" name="truck_type_id" @if($disabled) disabled @endif>
        @foreach($truck_types as $truck_type)
            <option @if($route->truck_type_id == $truck_type->id) selected
                @endif value="{{ $truck_type->id }}">{{ $truck_type->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
  <label for="deactivation_reason">Deactivation Reason</label>
  <input type="text" value="{{ old('deactivation_reason', $route->deactivation_reason) }}" name="deactivation_reason" 
    class="form-control" id="deactivation_reason" placeholder="Deactivation Reason" @if($disabled) disabled @endif>
</div>

<div class="form-group">
    <label for="deactivated_by">Deactivated By</label>
    <input type="text" value="{{ old('deactivated_by', $route->deactivated_by) }}" name="deactivated_by" 
        class="form-control" id="deactivated_by" placeholder="Deactivated By" @if($disabled) disabled @endif>
  </div>
<div class="form-group">
    <label for="is_active">Status</label>
    <select class="form-control" id="is_active" name="is_active" @if($disabled) disabled @endif>
        <option @if($route->is_active == 1) selected
            @endif value="1">Active</option>
        <option  @if($route->is_active != 1) selected
            @endif value="0">Inactive</option>
    </select>
</div>