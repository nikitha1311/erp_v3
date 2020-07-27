@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-header">
                        <h5>Create Customer</h5>
                    </div>
                    <form action="{{ route("customers.store") }}" method="post">
                        <div class="panel-body">   
                                {{csrf_field()}}
                                @include('masters.customers.partials._form',[
                                    'customer' => $customer,
                                    'disabled' => false
                                ])
                        </div>
                        <div class="panel-footer">
                            @include('components._formButtons',[
                                'primaryText' => 'Create'
                            ])
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
@endsection`