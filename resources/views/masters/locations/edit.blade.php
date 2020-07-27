@extends('layouts.app')

@section('content')
    <div class='container py-4'>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class='panel panel-default'>
                    <div class='panel-header'>
                        Edit Location Details
                    </div>

                    <form action="{{ route('locations.update',$locations->id) }}" method='POST'>
                        <div class='panel-body'>
                            @csrf
                            @method('PATCH')
                            @include('masters.locations.partials._form',[
                               'location' => $locations,
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
