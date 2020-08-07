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
                            <input required type="text" class="form-control m-input" id="paymentDate" name="date"
                                   placeholder="Date" autocomplete="off"
                                   value="{{ old('date') }}">
                            @if($errors->has('date'))
                                <span class="m-form__help twtext-red">{{ $errors->first('date') }}</span>
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
                                <span class="m-form__help twtext-red">{{ $errors->first('ledgerable_id') }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="form-group m-form__group">
                            <label for="amount">Amount</label>
                            <input required type="number" class="form-control m-input" id="amount" name="amount"
                                   placeholder="Amount" autocomplete="off"
                                   value="{{ old('amount') }}">
                            @if($errors->has('amount'))
                                <span class="m-form__help twtext-red">{{ $errors->first('amount') }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="form-group m-form__group">
                            <label for="payment_mode">Mode</label>
                            <select name="payment_mode" id="mode" class="form-control">
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="NEFT">NEFT</option>
                                <option value="Adjustments">Adjustments</option>
                            </select>
                            @if($errors->has('payment_mode'))
                                <span class="m-form__help twtext-red">{{ $errors->first('payment_mode') }}</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="form-group m-form__group">
                            <label for="payment_towards">Towards</label>
                            <select name="payment_towards" id="payment_towards" class="form-control">
                                @foreach(config('constants.paymentTowards') as $payment)
                                    <option value="{{ $payment }}">{{ $payment }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_towards'))
                                <span class="m-form__help twtext-red">{{ $errors->first('payment_towards') }}</span>
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
        <table class="table table-striped">
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
            @foreach($orders->pluck('income')->collapse() as $income)
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
    <div class="panel-footer">

    </div>
</div>

{{--<div class="m-portlet m-portlet--mobile ">--}}
{{--    <div class="m-portlet__head">--}}
{{--        <div class="m-portlet__head-caption">--}}
{{--            <div class="m-portlet__head-title">--}}
{{--                <h3 class="m-portlet__head-text">--}}
{{--                    --}}
{{--                </h3>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="m-portlet__body table-responsive">--}}
{{--        <hr>--}}
{{--    </div>--}}
{{--</div>--}}

@section('scripts')
    @parent
    <script>
        $('#paymentDate').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
    </script>
@append
