@extends('layouts.app')
@section('head')

@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Create a payment advice
            <small></small>
        </h5>
    </div>
    <div class="panel-body">
        <form action="{{ url("invoices/payment-advices") }}" method="post">
            @csrf

            <div class="form-group">
                <label for="date">Date</label>
                <input required type="text" class="form-control m-input" id="date" name="date"
                       placeholder="Date"
                       value="{{ old('date') }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="payment_mode">Payment Mode</label>
                <select name="payment_mode" id="payment_mode" class="form-control">
                    <option value="">Select an option</option>
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="NEFT">NEFT</option>
                </select>
                @if($errors->has('payment_mode'))
                    <span class="text-danger">{{ $errors->first('payment_mode') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                    <option value="">Select a Customer</option>
                    @foreach(billedOn() as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->code }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_id'))
                    <span class="text-danger">{{ $errors->first('customer_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <div class="input-group">
                                <span class="input-group-addon">
                                    Rs.
                                </span>
                    <input required type="number" min="0" step="0.01" class="form-control m-input" id="amount"
                           name="amount"
                           placeholder="Amount"
                           value="{{ old('amount') }}">
                </div>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="reference_number">Reference Number</label>
                <input required type="text" class="form-control m-input" id="reference_number"
                       name="reference_number" placeholder="Reference Number"
                       value="{{ old('reference_number') }}">
                @if($errors->has('reference_number'))
                    <span class="text-danger">{{ $errors->first('reference_number') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea required type="text" class="form-control m-input" id="remarks" name="remarks"
                          placeholder="Remarks">
                                {{ old('remarks') }}
                            </textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
            </div>

            <hr>

            <div class="panel-footer">
                @include('components._formButtons',[
                                'primaryText' => 'Create'
                                  ])
            </div>
        </form>
    </div>

</div>
@endsection
