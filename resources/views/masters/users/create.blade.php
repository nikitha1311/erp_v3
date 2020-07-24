@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-8  m-portlet m-portlet--mobile panel panel-default px-0">
                <div class="m-portlet__head panel-header">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h5 class="m-portlet__head-text">
                                Create User
                                <small></small>
                            </h5>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ url("users") }}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-arrow-left"></i>
                                        <span>Back</span>
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{ url("users") }}" method="post">
                    <div class="panel-body">
                        @csrf
                        @include('masters.users.partials._form',[
                            'user' => $user,
                            'disabled' => false
                        ])
                    </div>
                    <div class="panel-footer">
                        @include('components._formButtons', ['primaryText' => 'Create'])
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection


