@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Edit Vendor
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
        <form action="{{ route('vendors.update',$vendors->id) }}" method='POST'>
            <div class='panel-body'>
                @csrf
                @method('PATCH')
                @include('masters.vendors.partials._form',[
               'vendor' => $vendors,
                'disabled' => false,
                ])
            </div>
            <div class="panel-footer">
                @include('components._formButtons', ['primaryText' => 'Update'])
            </div>
        </form>
    </div>
@endsection
