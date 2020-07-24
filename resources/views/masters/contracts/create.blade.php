@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        Create Contract
                    </h5>
                </div>
                <form action="{{ route("contracts.store", [$customer->id]) }}" method="post">
                    <div class="panel-body">
                        {{csrf_field()}}
                        @include('masters.contracts.partials._form',[
                            'contract' => $contract,
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
@endsection

@section('scripts')
<script type='text/javascript'>
    $(document).ready( function () {
        $("#signed_at").datetimepicker();
    });
</script>
@endsection
