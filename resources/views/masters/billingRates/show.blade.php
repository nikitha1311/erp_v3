@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('masters.routes.partials._show')
        </div>
        <div class='col-md-8'>
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Billing Rate for Route
                    </h5>
                    <div>
                        <a href="{{ route('billing-rates.edit', [$billingrate->route_id,$billingrate->id]) }}"
                           class="btn btn-secondary">
                            <i class="fa fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ route('routes.show', [$billingrate->route->contract_id,$billingrate->route_id]) }}"
                           class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="rate">Rate</label>
                        <input type="text" disabled class="form-control" id="rate" value="{{ $billingrate->rate }}"
                               placeholder="Rate">
                    </div>
                    <div class="form-group">
                        <label for="wef">Wef</label>
                        <input type="text" disabled class="form-control"
                               value="{{ $billingrate->wef->format('d-m-Y') }}" id="wef" placeholder="Wef">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" disabled class="form-control" id="description"
                               value="{{ $billingrate->description }}" placeholder="description">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
