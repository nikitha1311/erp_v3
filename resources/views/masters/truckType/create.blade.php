@extends('layouts.app')

@section('content')
    <div class="col-md-6">
    <div class="panel panel-default">
            <div class="panel-header">
                <h5>
                    Rules For TruckType
                </h5>
            </div>
            <div class="panel-body">
                <div>
                    <ul>
                        <li>Use full forms like - container, taurus, FTL</li>
                        <li>Follow the format <strong>< FT > < TYPE > < BODY > </strong></li>
                        <li><strong>Eg. </strong>20FT CONTAINER</li>
                        <li><strong>Eg. </strong>32FT SXL CONTAINER</li>
                        <li><strong>Eg. </strong>40FT XXL CONTAINER</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-header">
                <h5>
                    Truck Type
                    <small></small>
                </h5>
                <div>
                    <ul>
                        <li>
                            <a href="{{ url("truck-types") }}">
                                <button class="btn btn-primary">
                                    <i class="fa fa-arrow-left"></i>
                                    <span>Back</span>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <form action="{{ url("truck-types") }}" method="post">
                <div class="panel-body">
                    @csrf
                    @include('masters.truckType.partials._form',[
                                   'trucks' => $trucks,
                                    'disabled' => false,
                                    ])
                </div>
                <div class="panel-footer">
                    @include('components._formButtons', ['primaryText' => 'Create'])
                </div>
            </form>
        </div>
</div>
@endsection
