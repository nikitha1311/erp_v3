@extends('layouts.app')

@section('content')
    <div class='container py-4'>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class='panel panel-default'>
                    <div class='panel-header'>
                        Edit User Details
                    </div>

                    <form action="{{ route('users.update',$user->id) }}" method='POST'>
                        <div class='panel-body'>
                            @csrf
                            @method('PATCH')
                            @include('masters.users.partials._form',[
                               'user' => $user,
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
