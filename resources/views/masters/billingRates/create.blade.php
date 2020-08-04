@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('masters.routes.partials._show')
        </div>
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Create Rate
                    </h5>
                </div>
                <form action="{{ route("billing-rates.store", $route->id) }}" method="post">
                    <div class="panel-body">
                            {{csrf_field()}}
                            @include('masters.billingRates.partials._form',[
                                'billing_rate' => $billing_rate,
                                'disabled' => false
                            ])
                    </div>
                    <div class="panel-footer">
                        @include('components._formButtons',[
                                'primaryText' => 'Create'
                            ])
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
