@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>Contract Details</h5>
                    <div>
                        <a href="{{ route('contracts.edit', [$customer->id,$contract->id]) }}"
                           class="btn btn-secondary">
                            <i class="fa fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ route('contracts.index',$customer->id) }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="id">Contract Id</label>
                            <input type="text" value="{{ $contract->id }}" class="form-control" id="id" placeholder="Id"
                                   disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" value="{{ $customer->name }}" class="form-control" id="name"
                                   placeholder="Name" disabled>
                        </div>
                        @include('masters.contracts.partials._form',[
                            'contract' => $contract,
                            'disabled' => true
                        ])
                        <div class="form-group">
                            <label for="created_by">Created By</label>
                            <input type="text" value="{{ $contract->createdBy->name }}" class="form-control"
                                   id="created_by" placeholder="Created By" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-header">
                    <h5>Route List</h5>
                    <div>
                        <a href="{{ route('routes.create', $contract->id) }}" class="btn btn-success">
                            <i class="fa fa-plus mr-2"></i>
                            <span>Route</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>Route ID</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Truck Type</th>
                                <th>Status</th>
                                <th>Deactivation Reason</th>
                                <th>Deactivated By</th>
                                <th>Created By</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contract->routes as $route)
                                <tr>
                                    <td>
                                        <a href="{{ route('routes.show',[$contract->id,$route->id]) }}">
                                            {{ $route->id }}
                                        </a>
                                    </td>
                                    <td>{{ $route->from }}</td>
                                    <td>{{ $route->to }}</td>
                                    <td>{{ $route->truckType->name ?? '-'}}</td>
                                    <td>{{ $route->is_active }}</td>
                                    <td>{{ $route->deactivation_reason ?? '-'}}</td>
                                    <td>{{ $route->deactivated_by ?? '-'}}</td>
                                    <td>{{ $route->CreatedBy->name }}</td>
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
