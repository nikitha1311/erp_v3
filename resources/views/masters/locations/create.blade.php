@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Locations
        </h5>
        <small></small>
        <div>
            <ul>
                <li>
                    <a href="{{ url("locations") }}">
                        <button class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ url("locations") }}" method="post">
            @csrf
            <div class="form-group m-form__group">
                <label for="name">Name</label>
                <input required type="text" class="form-control m-input" id="name" name="name"
                       placeholder="Name">
                @if($errors->has('name'))
                    <span class="m-form__help text-red">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="address">
                <input name="state" id="administrative_area_level_1" type="text"
                       hidden>
                <input name="district" id="administrative_area_level_2"
                       type="text"
                       hidden>
                <input name="locality" id="locality" type="text" hidden>
                <input name="formatted_address" id="formatted_address" type="text"
                       hidden>
                <input name="postal_code" id="postal_code" type="text" hidden>
            </div>
            <div class="panel-footer">
                @include('components._formButtons', ['primaryText' => 'Create'])

            </div>
        </form>
    </div>

</div>
@endsection
@section('scripts')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBWPxT8Da5qrEl2uIRako_P-5rEPWaIDxE&libraries=places"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"></script>

    <script>
        $('#name').geocomplete({
            country: ["IN", "NP"],
            details: '.address',
            detailsAttribute: 'id',
            types: ["(regions)"]
        });

    </script>

@endsection
