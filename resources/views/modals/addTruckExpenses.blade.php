@component('layouts.modal')
    @slot('id') createTruckExpense @endslot
    @slot('title') <b>{{$truck->number}}</b>  - Expense @endslot
    @slot('footer')  @endslot

    <form action="{{ url("fleetomata/trucks/{$truck->id}/truck-expenses") }}" method="POST">
        {!! csrf_field() !!}
        <div>
            <label for="expense_date">Expense Date</label>
            <input required type="text" class="form-control date" id="expense_date" name="expense_date" value="{{ old('expense_date') }}">
            @if($errors->has('expense_date'))
                <span class="text-danger">{{ $errors->first('expense_date') }}</span>
            @endif
        </div>
        <div>
            <label for="expense_type">Expense Type</label>
            <select name="type" class="form-control select2" style="width: 100%">
                @foreach(expenseType() as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
            @if($errors->has('type'))
                <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
        </div>
        <div>
            <label for="type_description">Expense Description</label>
            <input required type="text" class="form-control" id="type_description" name="type_description"
                value="{{ old('type_description',$truck->type_description) }}">
            @if($errors->has('type_description'))
                <span class="text-danger">{{ $errors->first('type_description') }}</span>
            @endif
        </div>
        <div>
            <label for="amount">Amount</label>
            <input required type="text" class="form-control" id="amount" name="amount"  value="{{ old('amount') }}">
            @if($errors->has('amount'))
                <span class="text-danger">{{ $errors->first('amount') }}</span>
            @endif
        </div>
        <div>
            <label for="valid_till">Valid Till</label>
            <input required type="text" class="form-control date" id="valid_till" name="valid_till" value="{{ old('valid_till') }}">
            @if($errors->has('valid_till'))
                <span class="text-danger">{{ $errors->first('valid_till') }}</span>
            @endif
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-default">Clear</button>
        </div>
    </form>

@endcomponent

@section('scripts')
    <script>
        $(function () {
            $('.date').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD-MM-YYYY'
                },
                maxDate: 0,
            });
            $('.select2').select2();
        })
    </script>
@append
