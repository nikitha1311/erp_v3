@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-header">
                <h5>Add New Route to Contract - {{$contract->id}} </h5>
            </div>
            <form action="{{ route("routes.store", [$customer->id,$contract->id]) }}" method="post">
                <div class="panel-body">
                    {{csrf_field()}}
                    @include('masters.routes.partials._form',[
                        'route' => $route,
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
