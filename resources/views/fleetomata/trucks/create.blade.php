@extends('layouts.app')

@section('content')

    
       
<div class="panel">
    <div class="panel-header">
        <h5>
            Create Truck
        </h5>
    </div>
    <form action="{{ url("/fleetomata/trucks") }}" method="POST">
        <div class="panel-body">
            @csrf
            @include('fleetomata.trucks.partials._form',[
                'truck' => $truck,
                'disabled' => false
            ])
            {{-- <div class="form-group">
                <label for="number">Truck Number</label>
                <input required type="text" class="form-control m-input" id="number" name="number"
                        placeholder="Truck Number"
                        value="{{ old('number') }}" autocomplete="off">
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="truck_type_id">Truck Type</label>
                <select name="truck_type_id" id="truck_type_id" class="form-control">
                    @foreach(truckTypes() as $truckType)
                        <option value="{{ $truckType->id }}">{{ $truckType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="group">Group</label>
                <select name="group" id="group" class="form-control">
                    <option value="JSM2518">JSM2518</option>
                    <option value="JSMTN">JSMTN</option>
                    <option value="JSM4923">JSM4923</option>
                </select>
                @if($errors->has('group'))
                    <span class="text-danger">{{ $errors->first('group') }}</span>
                @endif
            </div> --}}
        </div>
        <div class="panel-footer">
            @include('components._formButtons',[
                'primaryText' => 'Create'
            ])
        </div>
    </form>
</div>



@endsection
@section('scripts')

    <script>
        $('#truck_type_id').select2();
    </script>

@endsection




