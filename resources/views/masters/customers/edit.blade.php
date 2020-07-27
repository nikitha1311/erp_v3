@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-header">
                        <h5>Create Customer</h5>
                    </div>
                    <form action="{{ route("customers.update",$customer->id) }}" method="post">
                        <div class="panel-body">
                            @method('PATCH')
                            {{csrf_field()}}
                            @include('masters.customers.partials._form',[
                                'customer' => $customer,
                                'disabled' => false
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