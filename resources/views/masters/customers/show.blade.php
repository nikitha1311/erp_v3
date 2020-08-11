@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 d-flex">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-header">hi</div>
                    <div class="panel-body">heloo</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-header">hi</div>
                    <div class="panel-body">heloo</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-header">hi</div>
                    <div class="panel-body">heloo</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-header">hi</div>
                    <div class="panel-body">heloo</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>Customer Details</h5>
                    <div>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary">
                            <i class="fa fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ route('customers.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    @include('masters.customers.partials._form',[
                        'customer' => $customer,
                        'disabled' => true
                    ])
                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        Customer Contract List
                    </h5>

                    <a href="{{ route('contracts.create', [$customer->id]) }}" type="button" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Contract
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center" id="contracts_table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Description</th>
                                <th>Signed on</th>
                                <th>Valid till</th>
                                <th>Created by</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customer->contracts as $contract)
                                <tr>
                                    <td>
                                        <a href="{{ route('contracts.show',[$customer->id,$contract->id]) }}">
                                            {{$contract->id}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$contract->description }}
                                    </td>
                                    <td>
                                        {{ $contract->signed_at ? $contract->signed_at->format('d-m-Y') : '' }}
                                        {{-- {{$contract->signed_at->format('d-m-Y')}} --}}
                                    </td>
                                    <td>
                                        {{ $contract->valid_till ? $contract->valid_till->format('d-m-Y') : '' }}
                                        {{-- {{$contract->valid_till->format('d-m-Y')}} --}}
                                    </td>
                                    <td>
                                        {{$contract->createdBy->name}}
                                    </td>
                                    <td>
                                        {{$contract->status}}
                                    </td>
                                    <td>
                                        <form action="{{ route('contracts.destroy',[$customer->id,$contract->id]) }}" method='POST' class="delete_form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="fa fa-trash btn btn-danger delete_btn"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#contracts_table').DataTable();
    });
</script>
@endsection

