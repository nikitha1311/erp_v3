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
                        {{-- <a href="{{ route('billing-rate.create', [$customer->id,$contract->id,$route->id]) }}" class="btn btn-success">
                            <i class="fa fa-plus mr-2"></i>
                            <span>Billing Rate</span>
                        </a> --}}
                        <a href="{{ route('routes.index',[$contract->id,$route->id]) }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Billing Id</th>
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
                                        <td>{{$billing->wef->format('d-m-Y')}}</td>
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