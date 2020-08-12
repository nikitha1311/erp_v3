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
                    @include('masters.billingRates.partials._form',[
                        'billing_rate' => $billingrate,
                        'disabled' => true
                    ])     
                    @include('components._audits')
                </div>
            </div>
        </div>
    </div>
@endsection
