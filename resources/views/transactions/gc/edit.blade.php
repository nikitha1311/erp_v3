@extends('layouts.app')
@section('head')

@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Edit GC     <small></small>

            </h5>
            <div>
                <ul>
                    <li>

                    </li>
                </ul>
            </div>
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

{{--    <div class="row twflex twjustify-center">--}}
{{--        <div class="tww-full">--}}
{{--            <div class="m-portlet m-portlet--mobile ">--}}
{{--                <div class="m-portlet__head">--}}
{{--                    <div class="m-portlet__head-caption">--}}
{{--                        <div class="m-portlet__head-title">--}}
{{--                            <h3 class="m-portlet__head-text">--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
@section('scripts')

@endsection


