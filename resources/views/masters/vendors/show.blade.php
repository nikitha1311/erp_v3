@extends('layouts.app')


@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        Vendor
                    </h5>
                    <small></small>
                    <div class="float-right">
                        <a href="{{ route('vendors.edit', $vendors->id) }}" class="btn btn-secondary">
                            <i class="fa fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ route('vendors.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    @include('masters.vendors.partials._form',['vendor' => $vendors, 'disabled' => true])
                </div>
            </div>
        </div>
    </div>

@endsection


