@component('layouts.modal')
    @slot('id') updateInvoiceCredit @endslot
    @slot('title') Update Submission Status @endslot
    @slot('footer')  @endslot


    <form action="{{ url("invoices/{$invoice->id}/credits") }}" method="POST" autocomplete="off">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="date">Date</label>
            <input required type="text" class="form-control m-input" id="credit_date" name="date"
                   placeholder="Date"
                   value="{{ old('date') }}">
            @if($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">Select One</option>
                <option value="TDS">TDS</option>
                <option value="Adjustment">Adjustment</option>
            </select>
            @if($errors->has('type'))
                <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="payment_advice_id">Payment Advice</label>
            <select name="payment_advice_id" id="payment_advice_id" class="form-control" style="width: 100%">

            </select>
            @if($errors->has('payment_advice_id'))
                <span class="text-danger">{{ $errors->first('payment_advice_id') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input required type="number" min="0" step="0.01" class="form-control m-input" id="amount" name="amount"
                   placeholder="Amount"
                   value="{{ old('amount') }}">
            @if($errors->has('amount'))
                <span class="text-danger">{{ $errors->first('amount') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea required type="text" class="form-control m-input" id="remarks" name="remarks"
                      placeholder="Remarks"></textarea>
            @if($errors->has('remarks'))
                <span class="text-danger">{{ $errors->first('remarks') }}</span>
            @endif
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-default">Clear</button>
        </div>
    </form>

@endcomponent

@section('scripts')
    @parent
    <script>
        $('#credit_date').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });

        $('#payment_advice_id').select2({
            minimumInputLength: 2,
            dropdownParent: $("#updateInvoiceCredit"),
            ajax: {
                url: '/select2/payment-advices-for-invoices',
                data: function (params) {
                    var query = {
                        q: params.term,
                    }
                    return query;
                },
                processResults: function (data) {
                    return {
                        results : $.map(data, function(item){
                            return {
                                text : item.formattedID + " - Rs. " + item.amount,
                                id : item.id,
                            }
                        })
                    }
                }
            }
        });
    </script>
@append
