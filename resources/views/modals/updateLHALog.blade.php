@component('layouts.modal')
@slot('id') updateLHALog{{$lha->id}} @endslot
@slot('title') Update Time Log @endslot
@slot('footer')  @endslot

<form action="{{ "/loading-hire-agreements/".$lha->id."/timestamps" }}" id="updateLHATimeStampsModal" method="POST">
    {!! csrf_field() !!}
    {!! method_field('PATCH') !!}
    @if($transaction)
        <div class="d-flex justify-content-between">
            <p><b>Transaction ID : </b>{{ $transaction->id() }}</p>
            <p> <b>LHA Date : </b>{{ $lha->date->format('d-m-Y') }}</p>
            <p><b>LHA Number : </b>{{ $lha->number}}</p>
        </div>
    @endif
    <div class="form-group">
        <label>Select Log</label>
        <select name="log_type" id="log_type" class="form-control">
            <option value="loading_reported">Loading Reported</option>
            <option value="loading_released">Loading Released</option>
            <option value="unloading_reported">Unloading Reported</option>
            <option value="unloading_released">Unloading Released</option>
        </select>
    </div>
    <div class="form-group">
        <label>Time</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text input-grp-text">
                    <i class="fa fa-calendar"></i>
                </span>
            </div>
            <input type="text" class="form-control left-no-border date" required id="time" name="time" placeholder="Enter Time"
                   value="">
          </div>
    </div>
    <button class="btn btn-primary">Update</button>
</form>

@endcomponent

@section('scripts')
    <script>

        $('.date').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePickerIncrement: 10,
            locale: {
                format: 'DD-MM-YYYY h:mm A'
            }
        });
    </script>
@append
