@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Edit Billing Rate for Route - #{{$route->id}}
                    </h5>
                </div>
                <form action="{{ route("billing-rates.update", [$billingrate->route_id,$billingrate->id]) }}"method="post">
                    <div class="panel-body">
                        @method('PATCH')
                        {{csrf_field()}}
                        @include('masters.billingRates.partials._form',[
                            'billing_rate' => $billingrate,
                            'disabled' => false
                        ])
                    </div>
                    <div class="panel-footer">
                        @include('components._formButtons', ['primaryText' => 'Update'])
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
