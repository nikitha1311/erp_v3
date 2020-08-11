@extends('layouts.app')
@section('head')

@endsection
@section('content')


<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Edit Transaction
            <small></small>
        </h5>
        <div>
            <ul>
                <li>

                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ url("/transactions/{$transaction->id}") }}" method="post">
            {!! csrf_field() !!}
            {!! method_field('PATCH') !!}
            <div class="m-portlet__body">
                @include('transactions.partials._create',['gc'=>$transaction])
            </div>
            <div class="panel-footer">
                @include('components._formButtons', ['primaryText' => 'Update'])

            </div>

        </form>
    </div>

</div>

@endsection
