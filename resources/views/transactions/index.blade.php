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
                                    @foreach ($transaction->loadingHireAgreements as $lha)
                                    {{ $lha->truck_number }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($transaction->loadingHireAgreements as $lha)
                                    {{ $lha->number }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($transaction->goodsConsignmentNotes as $gc)
                                    {{ $gc->number }}
                                    @endforeach
                                </td>
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