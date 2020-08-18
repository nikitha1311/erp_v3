<div class="form-group">
    <label for="number">Invoice Number</label>
    <input required type="text" class="form-control m-input" placeholder="Invoice Number" disabled=""
           value="{{ \App\Domain\Constant::invoiceNumber() }}">
</div>

<div class="form-group">
    <label for="date">Bill Date</label>
    <input required type="text" class="form-control m-input" id="date" name="date"
           placeholder="Bill Date"
           value="{{ old('date') }}">
    @if($errors->has('date'))
        <span class="text-danger">{{ $errors->first('date') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="customer_id">Customer</label>
    <select class="form-control" name="customer_id" id="customer_id">

    </select>
    @if($errors->has('customer_id'))
        <span class="text-danger">{{ $errors->first('customer_id') }}</span>
    @endif
</div>

@section('scripts')
    @parent
    <script>
        $('#date').daterangepicker({
            singleDatePicker : true,
            timePicker : false,
            locale :{
                format : 'DD-MM-YYYY'
            }
        });
        $('#customer_id').select2({
            minimumInputLength: 3,
            ajax: {
                url: '/select2/customers',
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
                                text : item.name + " - " + item.code,
                                id : item.id,
                            }
                        })
                    }
                }
            }
        });
    </script>
@endsection
