@extends('layouts.app')

@section('content')
    <div class='row justify-content-center'>
        <div class="col-md-4">
            @include('masters.routes.partials._show')
        </div>
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Rate List
                    </h5>
                    <div>
                        <a href="{{ route('billing-rates.create',$route->id) }}" class="btn btn-success">
                            <i class="fa fa-plus mr-2"></i>
                            <span>Billing Rate</span>
                        </a>
                        <a href="{{ route('contracts.show',[$route->contract->customer_id,$route->contract_id]) }}"
                           class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>Billing Id</th>
                                <th>Rate</th>
                                <th>Wef</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($route->billingRates as $billing)
                                <tr>
                                    <td>
                                        <a href="{{ route('billing-rates.show',[$billing->route_id,$billing->id]) }}">
                                            {{$billing->id}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$billing->rate}}
                                    </td>
                                    <td>
                                        {{$billing->wef->format('d-m-Y')}}
                                    </td>
                                    <td>
                                        {{$billing->description}}
                                    </td>
                                    <td>
                                        {{$billing->createdBy->name}}
                                    </td>
                                    <td>
                                        <form action="{{ route('billing-rates.destroy',[$billing->route_id,$billing->id]) }}" method='POST'>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="fa fa-trash btn btn-danger"></button>
                                        </form>
                                    </td>
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
