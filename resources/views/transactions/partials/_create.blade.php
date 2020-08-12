<div>
    <div class="row">
        <div class="col col-lg-4">
            <div>
                <label for="date">Date</label>
                <input required type="text" class="form-control m-input" id="date" name="date"
                       placeholder="Date"
                       value="{{ $transaction->date ? $transaction->date->format('d-m-Y') : ''}}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-4">
            <div>
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control">
                    <option value="">Select the Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{$customer->id == $transaction->customer_id ? 'selected="selected"' : ''}}>{{ $customer->name }}
                            - {{ $customer->code }} </option>
                    @endforeach
                </select>
                @if($errors->has('customer_id'))
                    <span class="text-danger">{{ $errors->first('customer_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col col-lg-8">
            <div>
                <label for="route_id">Route</label>
                <select name="route_id" id="route_id" class="form-control" @if(!$transaction->route_id) disabled
                        @endif required>
                    @if($transaction->route_id)
                        <option value="{{$transaction->route_id}}" selected>
                            {{$transaction->route->from->formatted_address .'-'. $transaction->route->to->formatted_address .'-'. $transaction->route->truckType}}
                        </option>
                    @endif
                </select>
                @if($errors->has('route_id'))
                    <span class="text-danger">{{ $errors->first('route_id') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $('#customer_id').select2();
        // $('').select2();

        $('#date').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });

        $('#customer_id').on('change', function () {
            let customer_id = $(this).val();
            let route = $('#route_id');
            route.val('');
            route.attr('disabled', false);
            route.find('option').remove();
            $.ajax({
                url: '/select2/routes',
                method: 'get',
                data : {customer_id : customer_id},
                success : function(data){
                    $('#route_id').select2({
                        data : $.map(data, function (item) {
                            return {
                                text: item.contract.customer.code + " - " + item.from.formatted_address + " - " + item.to.formatted_address + " - " + item.truck_type.name,
                                id: item.id,
                            }
                        })
                    });
                }
            });
            $('#route_id').select2({
                ajax: {
                    url: '/select2/routes',
                    data: function (params) {
                        var query = {
                            q: params.term,
                            customer_id: customer_id,
                        }
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results:data.name,
                        }
                    }
                }
            });
        });
    </script>
@append
