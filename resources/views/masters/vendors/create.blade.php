@extends('layouts.app')

@section('content')

        <div class="panel panel-default">
            <div class="panel-header">
                <h5>
                    Add Vendor
                    <small></small>
                </h5>
                <div>
                    <ul>
                        <li>
                            <a href="{{ url("vendors") }}">
                                <button class="btn btn-primary">
                                    <i class="fa fa-arrow-left"></i>
                                    <span>Back</span>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <form action="{{ url("vendors") }}" method="post">
                <div class="panel-body">
                    @csrf
                    @include('masters.vendors.partials._form',[
                                   'vendor' => $vendors,
                                    'disabled' => false,
                                    ])
                </div>
                <div class="panel-footer">
                    @include('components._formButtons', ['primaryText' => 'Create'])
                </div>
            </form>
        </div>
@endsection
