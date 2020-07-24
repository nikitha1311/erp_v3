@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        Edit Contract Details
                    </h5>
                </div>
                <form action="{{ route("contracts.update",[$customer->id,$contract->id]) }}" method="post">
                    <div class="panel-body">
                        @method('PATCH')
                        {{csrf_field()}}
                        @include('masters.contracts.partials._form',[
                            'contract' => $contract,
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
@endsection