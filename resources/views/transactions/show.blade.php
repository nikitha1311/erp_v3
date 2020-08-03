@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">

            @include('transactions.partials._show')

            @include('transactions.lha.show')

            @include('transactions.gc.show')

        </div>
    </div>
@endsection
