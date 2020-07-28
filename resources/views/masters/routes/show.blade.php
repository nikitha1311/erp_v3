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
                        <a href="{{ route('billing-rate.create', [$customer->id,$contract->id,$route->id]) }}" class="btn btn-success">
                            <i class="fa fa-plus mr-2"></i>
                            <span>Billing Rate</span>
                        </a>
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
                        @include('masters.routes.partials._form',[
                            'route' => $route,
                            'disabled' => true
                        ])                 
                        <div class="form-group">
                            <label for="created_by">Created By</label>
                            <input type="text" disabled value="{{ $route->CreatedBy->name }}" class="form-control" id="created_by" placeholder="Created By">
                        </div>      
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Billing Rates List for Route
                    </h5>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Route Id</th>
                                <th>Rate</th>
                                <th>Wef</th>
                                <th>Description</th>
                                <th>Created By</th>
                              </tr>
                            </thead>

                            <tbody>
                                @foreach ($route->billingRates as $billing)
                                    <tr>
                                        <td>
                                            <a href="{{ route('billing-rate.show',[$customer->id,$contract->id,$route->id,$billing->id]) }}">
                                                {{$billing->id}}
                                            </a>
                                        </td>
                                        <td>{{$billing->rate}}</td>
                                        <td>{{$billing->wef}}</td>
                                        <td>{{$billing->description}}</td>
                                        <td>{{$billing->CreatedBy->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection