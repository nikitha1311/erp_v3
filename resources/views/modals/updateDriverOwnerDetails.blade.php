@component('layouts.modal')
    @slot('id') updateLHADriverOwnerDetails{{$lha->id}} @endslot
    @slot('title') Update Driver Owner Detail @endslot
    @slot('footer')  @endslot

    <form action="{{ "/loading-hire-agreements/".$lha->id."/driver-owner-details" }}" method="POST">
        {!! csrf_field() !!}
        @if($transaction)
            <div class="d-flex justify-content-between">
                <p><b>Transaction ID : </b>{{ $transaction->id() }}</p>
                <p><b>LHA Date : </b>{{ $lha->date->format('d-m-Y') }}</p>
                <p><b>LHA Number : </b>{{ $lha->number}}</p>
            </div>
            <div class="m-separator m-separator--space m-separator--dashed"></div>
        @endif
        <div class="form-group m-form__group">
            <label for="owner_name">Owner Name</label>
            <input required type="text" class="form-control m-input" id="owner_name" name="owner_name"
                   placeholder="Owner Name"
                   value="{{ old('owner_name') ?? $lha->owner_name }}">
            @if($errors->has('owner_name'))
                <span class="m-form__help twtext-red">{{ $errors->first('owner_name') }}</span>
            @endif
        </div>
        <div class="form-group m-form__group">
            <label for="owner_phone">Owner Phone</label>
            <input required type="text" class="form-control m-input" id="owner_phone" name="owner_phone"
                   placeholder="Owner Phone"
                   value="{{ old('owner_phone') ?? $lha->owner_phone }}">
            @if($errors->has('owner_phone'))
                <span class="m-form__help twtext-red">{{ $errors->first('owner_phone') }}</span>
            @endif
        </div>

        <div class="form-group m-form__group">
            <label for="driver_name">Driver Name</label>
            <input required type="text" class="form-control m-input" id="driver_name" name="driver_name"
                   placeholder="Driver Name"
                   value="{{ old('driver_name') ?? $lha->driver_name }}">
            @if($errors->has('driver_name'))
                <span class="m-form__help twtext-red">{{ $errors->first('driver_name') }}</span>
            @endif
        </div>
        <div class="form-group m-form__group">
            <label for="driver_phone">Driver Phone</label>
            <input required type="text" class="form-control m-input" id="driver_phone" name="driver_phone"
                   placeholder="Driver Phone"
                   value="{{ old('driver_phone') ?? $lha->driver_phone }}">
            @if($errors->has('driver_phone'))
                <span class="m-form__help twtext-red">{{ $errors->first('driver_phone') }}</span>
            @endif
        </div>
        <button class="btn btn-primary">Update</button>
    </form>

@endcomponent
