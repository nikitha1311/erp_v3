@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <h5>
                Transactions
            </h5>
            <div>

            </div>
        </div>
        <div class="panel-body">
            <div>
                <div class="dropdown text-right filter">
                    <button class="btn btn-primary btn-default dropdown-toggle" type="button" id="filter" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-filter"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="filter">
                        <h6 class="dropdown-header">
                            Branch
                        </h6>
                        <select name="branch_id" id="branch_id" class="form-control">
                            <option value="">Select the Branch</option>
                            {{-- @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach --}}
                        </select>
                      {{-- <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a> --}}
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center"  id='transaction_list'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Truck Type</th>
                            <th>Truck</th>
                            <th>LHA</th>
                            <th>GC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction )
                            <tr>
                                <td>
                                    <a href="{{ route('transactions.show', $transaction->id) }}">
                                        {{ $transaction->id() }}
                                    </a>
                                </td>
                                <td>
                                    {{ $transaction->date->format('d-m-Y') }}
                                </td>
                                <td>
                                    {{ $transaction->customer->code }}
                                </td>
                                <td>
                                    {{ $transaction->route->from }}
                                </td>
                                <td>
                                    {{ $transaction->route->to }}
                                </td>
                                <td>
                                    {{ $transaction->route->truckType['name']}}
                                </td>
                                 <td>
                                    {{ $transaction->lha_id }}
                                </td>
                                {{-- <td>
                                    @foreach ($transaction->loadingHireAgreements as $lha)
                                    {{ $lha->number }}
                                    @endforeach
                                </td> --}}
                                {{-- <td>
                                    @foreach ($transaction->goodsConsignmentNotes as $gc)
                                    {{ $gc->number }}
                                    @endforeach
                                </td>   --}}
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#transaction_list').DataTable();
    });
</script>
@append