@extends('layouts.app')
@section('head')

@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Edit GC
            </h5>
        </div>
        <div class="panel-body">
            <form action="{{ url("/goods-consignment-notes/{$gc->id}") }}" method="post">
                {!! csrf_field() !!}
                {!! method_field('PATCH') !!}
                    @include('transactions.gc.partials._create',['gc'=>$gc])

                <div class="panel-footer">
                    @include('components._formButtons', ['primaryText' => 'Update'])

                </div>
            </form>
        </div>

    </div>
    <div>
        @include('components._audits')

    </div>

@endsection



