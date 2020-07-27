@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-header">
                <h5>Edit Route to Contract - {{$contract->id}} </h5>
            </div>
            <form action="{{ route("routes.update", [$customer->id,$contract->id,$route->id]) }}" method="post">
                <div class="panel-body">
                    @csrf
                    @method('PATCH')
                    @include('masters.routes.partials._form',[
                        'route' => $route,
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