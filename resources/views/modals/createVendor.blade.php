@component('layouts.modal')
@slot('id') createVendor @endslot
@slot('title') Create Vendor @endslot
@slot('footer')  @endslot
@if($transaction)
    <div class="twflex twjustify-between">
        <p><b>Transaction ID : </b>{{ $transaction->id() }}</p>
        <p><b>Date : </b>{{ $transaction->date->format('d-m-Y') }}</p>
        <p>
            <b>Created By: </b>{{ $transaction->createdBy->name }} <br>
            <span class="text-muted">{{ $transaction->created_at->toDayDateTimeString() }}</span>
        </p>
    </div>
@endif

<form id="createVendorForm">
    {!! csrf_field() !!}
    @include('masters.vendors.partials._form')
    <hr>
    <button class="btn btn-primary" onclick="createVendor(event)">Submit</button>
</form>

@endcomponent

@section('scripts')
    <script>

        $('#time').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePickerIncrement: 10,
            locale: {
                format: 'DD-MM-YYYY h:mm A'
            }
        });

        function createVendor(event) {
            event.preventDefault();
            var formData = $('#createVendorForm').serializeArray();
            var url = "/vendors?t_id=" + "{{$transaction != null ?? $transaction->id}}";
            console.log(url,formData);
            $.post( url, formData, function(res){
                $('#createVendorForm').trigger("reset");
                $('#createVendor').click();
                toastr.success("Vendor Created successfully");
                var el = $('#vendor_id');
                el.append($("<option selected></option>")
                        .attr("value", res.vendor.id).text(res.vendor.name + '-' + res.vendor.company_name));

            }).fail(function(data) {
                console.log(data);
                var errors = data.responseJSON; // An array with all errors.
                console.log(errors,errors.errors.length);
                $.each( errors.errors, function( key, value ) {
                    toastr.error(value);
                });
            })
        }
    </script>
@append