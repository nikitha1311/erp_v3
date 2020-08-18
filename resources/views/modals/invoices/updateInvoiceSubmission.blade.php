@component('layouts.modal')
    @slot('id') updateInvoiceSubmission @endslot
    @slot('title') Update Submission Status @endslot
    @slot('footer')  @endslot

    <form action="{{ url("invoices/{$invoice->id}/statuses") }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="date">Date</label>
            <input required type="text" class="form-control" id="status_date" name="date"
                   placeholder="Date"
                   value="{{ old('date') }}">
            @if($errors->has('date'))
                <span class="text-danger">{{ $errors->first('date') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0">Open for Modification</option>
                <option value="1">Submitted</option>
            </select>
            @if($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea required type="text" class="form-control" id="remarks" name="remarks"
                      placeholder="Remarks">

                        </textarea>
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
        $('#status_date').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
    </script>
@append
