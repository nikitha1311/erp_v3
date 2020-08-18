<div class="panel">
    <div class="table-responsive">
        <table class="table table-bordered" id="invoiceRows">
            <thead>
            <tr>
                <th>Transactions</th>
                <th>Freight</th>
                <th>Manual Freight</th>
                <th>Loading Charges</th>
                <th>Unloading Charges</th>
                <th>Handling</th>
                <th>Detention</th>
                <th>L Detn. Hrs</th>
                <th>U/L Detn. Hrs</th>
                <th>Other Charges</th>
                <th>Remarks</th>
                <th>Total</th>
            </tr>
            </thead>
            @foreach($invoice->rows as $row)
                <tr>
                    <td class="w-25">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>
                                    <b>
                                        <a target="_blank"
                                           href="{{ url("/transactions/{$row->transaction_id}") }}">{{ $row->transaction->id() }}</a>
                                    </b>
                                </p>
                            </div>
                            <div>
                                @if($invoice->isOpenForModification())
                                    <form action="{{ url("invoices/{$invoice->id}/invoice-rows/{$row->id}") }}" method="post" class="delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger rounded-circle btn-sm delete_btn">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <p>
                            Route
                        </p>
                        <p><b>From : </b>{{ $row->transaction->route->from->formatted_address }}</p>
                        <p><b>To : </b>{{ $row->transaction->route->to->formatted_address }}</p>
                        <p><b>Truck Type : </b>{{ $row->transaction->route->truckType->name }}</p>
                        <p>
                            <b>LHA : </b>
                            <a target="_blank"
                               href="{{ url("loading-hire-agreements/{$row->transaction->defaultLHA->id}") }}">
                                {{ $row->transaction->defaultLHA->number }}
                            </a> - {{ $row->transaction->defaultLHA->date->format('d-m-Y') }}
                        </p>
                        <p>
                            <b>GCs : </b> <br>
                            @foreach($row->transaction->goodsConsignmentNotes as $goodsConsignmentNote)
                                <a target="_blank"
                                   href="{{ url("goods-consignment-notes/{$goodsConsignmentNote->id}") }}">
                                    {{ $goodsConsignmentNote->number }}
                                </a>
                                - {{ $goodsConsignmentNote->date->format('d-m-Y') }}
                                <br>
                            @endforeach
                        </p>
                    </td>
                    <td>{{ $row->transaction->billingRate->rate }}</td>
                    <td>{{ $row->transaction->manual_freight }}</td>
                    <td>{{ $row->transaction->loading }}</td>
                    <td>{{ $row->transaction->unloading }}</td>
                    <td>{{ $row->transaction->handling }}</td>
                    <td>{{ $row->transaction->detention }}</td>
                    <td>{{ $row->transaction->defaultLHA->loading_detention }}</td>
                    <td>{{ $row->transaction->defaultLHA->unloading_detention }}</td>
                    <td>{{ $row->transaction->others }}</td>
                    <td>{{ $row->transaction->remarks }}</td>
                    <td>{{ $row->transaction->total  }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $('#invoiceRows').dataTable({
            aaSorting: [],
        });
    </script>
@append
