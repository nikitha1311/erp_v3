@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-header">
                <h5>Add New Route to Contract - </h5>
            </div>
            <div class="panel-body">
                <form action="{{ route("routes.store", [$customer->id,$contract->id]) }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="from_id">From</label>
                        <select class="form-control" id="from_id">
                            @foreach($locations as $location)
                                <option  selected value="{{$location->id}}">{{$location->district}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="to_id">To</label>
                        <select class="form-control" id="to_id">
                            @foreach($locations as $location)
                                <option  selected value="{{$location->id}}">{{$location->district}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="truck_type_id">Truck Type</label>
                        <select class="form-control" id="truck_type_id">
                            @foreach($truck_types as $truck_type)
                                <option  selected value="{{$truck_type->id}}">{{$truck_type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="deactivation_reason">Deactivation Reason</label>
                      <input type="text" class="form-control" id="deactivation_reason" placeholder="Deactivation Reason">
                    </div>
                    {{-- <div class="form-group">
                        <label for="deactivated_by">Deactivated By</label>
                        <select class="form-control" id="deactivated_by">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="deactivated_by">Deactivated By</label>
                        <input type="text" class="form-control" id="deactivated_by" placeholder="Deactivated By">
                      </div>
                    <div class="form-group">
                        <label for="is_active">Status</label>
                        <select class="form-control" id="is_active">
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