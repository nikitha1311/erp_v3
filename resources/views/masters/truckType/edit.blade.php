@extends('layouts.app')

@section('content')
    <div class='container py-4'>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class='panel panel-default'>
                    <div class='panel-header'>
                        Edit TruckType Details
                    </div>

                    <form action="{{ route('truck-types.update',$trucks->id) }}" method='POST'>
                        <div class='panel-body'>
                            @csrf
                            @method('PATCH')
                            @include('masters.truckType.partials._form',[
                           'trucks' => $trucks,
                            'disabled' => false,
                            ])
                        </div>
                        <div class="panel-footer">
                            @include('components._formButtons', ['primaryText' => 'Update'])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
