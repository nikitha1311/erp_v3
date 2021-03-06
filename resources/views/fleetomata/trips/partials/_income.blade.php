<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Payment Ledger
            <small></small>
        </h5>

    </div>
    <div class="panel-body">
        <form action="{{ url("fleetomata/trips/{$trip->id}/incomes") }}" method="POST">
            @csrf
            <table class="table table-striped m-table">
                <tr>
                    <td>
                        <div>
                            <label for="date">Date</label>
                            <input required type="text" class="form-control dmy" id="paymentDate" name="date"
                                   placeholder="Date" autocomplete="off"
                                   value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div>
                            <label for="ledgerable_id">From</label>
                            <select name="ledgerable_id" id="ledgerable_id" class="form-control">
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->id() }} - {{ optional($order->vendor)->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ledgerable_id'))
                                <span class="text-danger">{{ $errors->first('ledgerable_id') }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div>
                            <label for="amount">Amount</label>
                            <input required type="number" class="form-control m-input" id="amount" name="amount"
                                   placeholder="Amount" autocomplete="off"
                                   value="{{ old('amount') }}">
                            @if($errors->has('amount'))
                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div>
                            <label for="payment_mode">Mode</label>
                            <select name="payment_mode" id="mode" class="form-control">
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="NEFT">NEFT</option>
                                <option value="Adjustments">Adjustments</option>
                            </select>
                            @if($errors->has('payment_mode'))
                                <span class="text-danger">{{ $errors->first('payment_mode') }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div>
                            <label for="payment_towards">Towards</label>
                            <select name="payment_towards" id="payment_towards" class="form-control">
                                @foreach(config('constants.paymentTowards') as $payment)
                                    <option value="{{ $payment }}">{{ $payment }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_towards'))
                                <span class="text-danger">{{ $errors->first('payment_towards') }}</span>
                            @endif
                        </div>
                    </td>
                    <td style="vertical-align: middle;">
                        <div class="m-form__actions">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Clear</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped" id="vendor_ledgers">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Vendor</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Mode</th>
                    <th>Towards</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders->pluck('income')->collapse() as $income )
                    <tr>
                        <td>{{ $income->id() }}</td>
                        <td>{{ optional($income->vendor)->name }}</td>
                        <td>{{ $income->date->format('d-m-Y') }}</td>
                        <td>{{ numberToCurrency($income->amount) }}</td>
                        <td>{{ $income->payment_mode }}</td>
                        <td>{{ $income->payment_towards }}</td>
                        <td>
                            <form action="{{ url("fleetomata/trips/{$trip->id}/incomes/{$income->id}") }}" method="POST">
                                @csrf
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Total</th>
                    <th colspan="6" class="twtext-center">
                        {{ numberToCurrency($orders->pluck('income')->collapse()->sum('amount')) }} -
                        {{ getIndianCurrency($orders->pluck('income')->collapse()->sum('amount')) }}
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
    <div class="panel-footer">
        @forelse ($orders->pluck('income')->collapse() as $income)
            @dump($loop->index )
            @foreach ($income->audits as $audit)
            <div id="accordion">
                <div class="panel">
                <div class="panel-header" id="{{ $loop->index }}">
                    <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#a{{ $loop->index }}" aria-expanded="true" aria-controls="">
                            @lang('article.updated.metadata', $audit->getMetadata())
                        </button>
                    </h5>
                </div>
                
                <div id="a{{ $loop->index }}" class="collapse fade show" aria-labelledby="{{ $loop->index }}" data-parent="#accordion">
                    <div class="panel-body">
                        @foreach ($audit->getModified() as $attribute => $modified)
                        <ul class="single-audit">
                            <li>
                                @lang($attribute.' has been '.$audit->event.' from <strong> :old </strong> '.'to <strong>:new</strong> ', $modified)
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div> 
            @endforeach 
        @empty
        <p>
            @lang('article.unavailable_audits')
        </p>
        @endforelse
    </div>
</div>
@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#vendor_ledgers').DataTable();
    });
</script>
@append
