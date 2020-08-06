<div class="form-group">
    <label for="number">Truck Number</label>
    <input required type="text" class="form-control m-input" id="number" name="number"
            placeholder="Truck Number"
            value="{{ old('number',$truck->number) }}" autocomplete="off">
    @if($errors->has('number'))
        <span class="text-danger">{{ $errors->first('number') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="truck_type_id">Truck Type</label>
    <select name="truck_type_id" id="truck_type_id" class="form-control">
        @foreach(truckTypes() as $truckType)
        <option @if($truck->truck_type_id == $truckType->id) selected
            @endif value="{{ $truckType->id }}">{{ $truckType->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="group">Group</label>
    <select name="group" id="group" class="form-control">
        <option value="JSM2518" @if($truck->group == 'JSM2518') selected @endif>JSM2518</option>
        <option value="JSMTN" @if($truck->group == 'JSMTN') selected @endif>JSMTN</option>
        <option value="JSM4923" @if($truck->group == 'JSM4923') selected @endif>JSM4923</option>
    </select>
    @if($errors->has('group'))
        <span class="text-danger">{{ $errors->first('group') }}</span>
    @endif
</div>
