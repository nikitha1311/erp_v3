@extends('layouts.app')

@section('content')
    <div class='row justify-content-center align-items-center'>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Contract Route Details
                    </h5>
                    <div>
                        <a href="{{ route('routes.edit', [$customer->id,$contract->id,$route->id]) }}" class="btn btn-secondary">
                            <i class="fa fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ route('routes.index',[$customer->id,$contract->id]) }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="from_id">From</label>
                            <select class="form-control" id="from_id" disabled>
                                {{-- @foreach($locations as $location) --}}
                                    <option  selected >{{$route->from}}</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="to_id">To</label>
                            <select class="form-control" id="to_id" disabled>
                                {{-- @foreach($locations as $location) --}}
                                    <option  selected >{{$route->to}}</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="truck_type_id">Truck Type</label>
                            <select class="form-control" id="truck_type_id" disabled>
                                {{-- @foreach($truck_types as $truck_type) --}}
                                    <option  selected value="">{{$route->truckType->name}}</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
    
                        <div class="form-group">
                          <label for="deactivation_reason">Deactivation Reason</label>
                        <input type="text" disabled value="{{ $route->deactivation_reason }}" class="form-control" id="deactivation_reason" placeholder="Deactivation Reason">
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
                            <input type="text" disabled value="{{ $route->deactivated_by }}" class="form-control" id="deactivated_by" placeholder="Deactivated By">
                        </div>
                        <div class="form-group">
                            <label for="created_by">Created By</label>
                            <input type="text" disabled value="{{ $route->CreatedBy->name }}" class="form-control" id="created_by" placeholder="Created By">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <select class="form-control" id="is_active" disabled>
                              <option selected value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection