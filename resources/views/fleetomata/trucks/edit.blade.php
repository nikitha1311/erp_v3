@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-md-8">
        <div class="panel">
            <div class="panel-header">
                <h5>Edit Truck </h5>
            </div>
            <form action="{{ route("trucks.update", [$truck->id]) }}" method="post">
                <div class="panel-body">
                    @csrf
                    @method('PATCH')
                    @include('fleetomata.trucks.partials._form',[
                        'truck' => $truck,
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