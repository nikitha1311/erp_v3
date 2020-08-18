@extends('layouts.app')
@section('head')

@endsection
@section('content')

    <div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Create an Invoice <small></small>

        </h5>

    </div>
    <div class="panel-body">
        <form action="{{ url("invoices") }}" method="POST">
            {!! csrf_field() !!}
            @include("invoices.partials._create")
            <hr>
            <div class="panel-footer">
                @include('components._formButtons',[
                'primaryText' => 'Create'
                  ])
            </div>
        </form>
    </div>

</div>
@endsection
