@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">

            @include('transactions.partials._show')

            @include('transactions.lha.show')

            @include('transactions.gc.show')

{{--            <div class="panel">--}}
{{--                <div class="panel-header">--}}
{{--                    <h5>--}}
{{--                        Goods Consignment Notes--}}
{{--                    </h5>--}}
{{--                    <div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="panel-body">--}}
{{--                    @include('transactions.gc.show')--}}

{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
