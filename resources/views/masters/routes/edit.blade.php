@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-header">
                <h5>Edit Route to Contract - {{$contract->id}} </h5>
            </div>
            <div class="panel-body">
                <form action="{{ route("routes.update", [$customer->id,$contract->id,$route->id]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    {{-- {{csrf_field()}} --}}
                    <div class="form-group">
                        <label for="from_id">From</label>
                        <select class="form-control" id="from_id" name="from_id">
                            @foreach($locations as $location)
                                <option @if($route->from_id == $location->id) selected
                                    @endif value="{{ $location->id }}">{{ $location->district }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="to_id">To</label>
                        <select class="form-control" id="to_id" name="to_id">
                            @foreach($locations as $location)
                                <option @if($route->to_id == $location->id) selected
                                    @endif value="{{ $location->id }}">{{ $location->district }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="truck_type_id">Truck Type</label>
                        <select class="form-control" id="truck_type_id" name="truck_type_id">
                            @foreach($truck_types as $truck_type)
                                <option @if($route->truck_type_id == $truck_type->id) selected
                                    @endif value="{{ $truck_type->id }}">{{ $truck_type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="deactivation_reason">Deactivation Reason</label>
                      <input type="text" value="{{ $route->deactivation_reason }}" name="deactivation_reason" class="form-control" id="deactivation_reason" placeholder="Deactivation Reason">
                    </div>
                   
                    <div class="form-group">
                        <label for="deactivated_by">Deactivated By</label>
                        <input type="text" value="{{ $route->deactivated_by }}" name="deactivated_by" class="form-control" id="deactivated_by" placeholder="Deactivated By">
                      </div>
                    <div class="form-group">
                        <label for="is_active">Status</label>
                        <select class="form-control" id="is_active" name="is_active">
                          <option selected value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection