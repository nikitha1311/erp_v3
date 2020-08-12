@extends('layouts.app')


@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-header">
                    User Profile
                    <div class="float-right">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">
                            <i class="fa fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ route('users.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    @include('masters.users.partials._form',['user' => $user, 'disabled' => true])
                    @include('components._audits')
                </div>
            </div>
        </div>
    </div>
@endsection


