@extends('layouts.app')
@section('head')

@endsection
@section('content')

    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Edit LHA
            </h5>
            <div>
                <ul>
                    <li>

                    </li>
                </ul>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ url("/loading-hire-agreements/{$lha->id}") }}" method="post">
                {!! csrf_field() !!}
                {!! method_field('PATCH') !!}
                <div class="m-portlet__body">
                    @include('transactions.lha.partials._create',['lha' => $lha])
                </div>
                <div class="panel-footer">
                    @include('components._formButtons', ['primaryText' => 'Create'])
                </div>
            </form>

        </div>

    </div>

@endsection
