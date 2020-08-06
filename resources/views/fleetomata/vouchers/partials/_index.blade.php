    <div class="panel">
        <div class="panel-header">
            <h5>
                Expenses List
            </h5>
        </div>

        <div class="panel-body">
            <form action="{{ url("fleetomata/trips/{$trip->id}/expenses") }}" method="POST">
                @csrf
                <input type="text" value="{{ $trip->truck_id }}" name="truck_id" hidden>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>
                            <div class="form-group m-form__group">
                                <label for="when">When</label>
                                <input required type="text" class="form-control m-input" id="when" name="when"
                                       placeholder="When"
                                       value="{{ old('when') }}">
                                @if($errors->has('when'))
                                    <span class="text-danger">{{ $errors->first('when') }}</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="form-group m-form__group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                    @foreach(config('constants.vouchers') as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('type'))
                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="form-group m-form__group">
                                <label for="amount">Amount</label>
                                <input required type="number" class="form-control m-input" id="amount" name="amount"
                                       placeholder="Amount"
                                       value="{{ old('amount') }}" autocomplete="off">
                                @if($errors->has('amount'))
                                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="form-group m-form__group">
                                <label for="remarks">Remarks</label>
                                <input required type="text" class="form-control m-input" id="remarks" name="remarks"
                                       placeholder="Remarks"
                                       value="{{ old('remarks') }}" autocomplete="off">
                                @if($errors->has('remarks'))
                                    <span class=text-danger">{{ $errors->first('remarks') }}</span>
                                @endif
                            </div>
                        </td>
                        <td style="vertical-align: middle">
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Clear</button>
                            </div>
                        </td>
                    </tr>

                </table>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>When</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                        <th>Created By</th>
                        @role('admin')
                        <th></th>
                        @endrole
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trip->ledgers as $ledger)
                        <tr>
                            <td title="{{ $ledger->approvalStatus() ? 'Approved By '.$ledger->approvalStatus()->approvedBy->name.' at '.$ledger->approvalStatus()->created_at->toDayDateTimeString() : 'Not Approved' }}">
                                {{ $ledger->id() }}
                                @if($ledger->isApproved())
                                    <i class="text-success fa fa-check"></i>
                                @else
                                    <i class="text-danger fa fa-times"></i>
                                @endif

                            </td>
                            <td>{{ $ledger->when->toDayDateTimeString() }}</td>
                            <td>{{ $ledger->type }}</td>
                            <td>{{ numberToCurrency($ledger->amount) }}</td>
                            <td>{{ $ledger->remarks }}</td>
                            <td>
                                {{ $ledger->createdBy->name }}<br>
                                <span>{{ $ledger->created_at->toDayDateTimeString() }}</span>
                            </td>
                            {{-- @role('admin') --}}
                            <td>
                                <form action="{{ url("fleetomata/trips/{$trip->id}/expenses/{$ledger->id}") }}"
                                      method="POST">
                                    @csrf
                                    {!! method_field('DELETE') !!}
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            {{-- @endrole --}}
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center" colspan="3">Total</th>
                        <th class="text-center" colspan="1">
                            <i class="fa fa-inr"></i> {{ numberToCurrency($trip->ledgers->sum('amount')) }}
                        </th>
                        <th class="text-center" colspan="2">
                            {{ getIndianCurrency($trip->ledgers->sum('amount')) }}
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@section('scripts')
    @parent
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $('#when').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
    </script>
@append
