

<div>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group m-form__group">
                <label for="date">Date</label>
                <input required type="text" class="form-control m-input" id="date" name="date"
                       placeholder="Date"
                       value="{{ $lha->date ? $lha->date->format('d-m-Y') : '' }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group m-form__group">
                <label for="branch_id">Branch</label>
                <select name="branch_id" id="branch_id" class="form-control">
                    @foreach(branches() as $branch)
                        <option value="{{ $branch->id }}" {{$branch->id == $lha->branch_id ? 'selected="selected"' : ''}}>{{ $branch->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('branch_id'))
                    <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group m-form__group">
                <label for="expected_delivery_date">Expected Delivery</label>
                <input required type="text" class="form-control m-input" id="expected_delivery_date"
                       name="expected_delivery_date" placeholder="Expected Delivery"
                       value="{{ old('expected_delivery_date') }}">
                @if($errors->has('expected_delivery_date'))
                    <span class="text-danger">{{ $errors->first('expected_delivery_date') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="form-group m-form__group">
                <label for="number">Number</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text input-grp-text">
                            <input class='mr-2' type="checkbox" name="autogenerate" onclick="var input = document.getElementById('number'); if(!this.checked){ input.disabled = false; input.focus();}else{input.disabled=true;}"/>
                            Auto-Generate
                        </span>
                    </div>
                    <input type="text"  class="form-control  left-border" id="number" name="number"
                    placeholder="Number" autocomplete="off"
                    value="{{ $lha->number ? $lha->number : old('number') }}"
                    style="text-transform:uppercase">
                </div>
               
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="form-group m-form__group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="0"{{$lha->type == 0 ? 'selected="selected"': ''}}>Local</option>
                    <option value="1" {{$lha->type == 1 ? 'selected="selected"': ''}}>Full Trip</option>
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group m-form__group">
                <label for="from_id">From</label>
                <select name="from_id" id="from_id" class="form-control select">
                    @foreach(locations() as $location)
                        <option value="{{ $location->id }}" {{$location->id == $lha->from_id ? 'selected="selected"': ''}}>{{ $location->formatted_address }}</option>
                    @endforeach
                </select>
                @if($errors->has('from_id'))
                    <span class="text-danger">{{ $errors->first('from_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group m-form__group">
                <label for="to_id">To</label>
                <select name="to_id" id="to_id" class="form-control select">
                    @foreach(locations() as $location)
                        <option value="{{ $location->id }}" {{$location->id == $lha->to_id ? 'selected="selected"': ''}}>{{ $location->formatted_address }}</option>
                    @endforeach
                </select>
                @if($errors->has('to_id'))
                    <span class="text-danger">{{ $errors->first('to_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group m-form__group">
                <label for="truck_type_id">Truck Type</label>
                <select name="truck_type_id" id="truck_type_id" class="form-control select">
                    @foreach(truckTypes() as $truckType)
                        <option value="{{ $truckType->id }}" {{$truckType->id == $lha->truck_type_id ? 'selected="selected"': ''}}>{{ $truckType->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('truck_type_id'))
                    <span class="text-danger">{{ $errors->first('truck_type_id') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div>
                <label for="truck_number">Truck Number</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text input-grp-text" id="inputGroup-sizing-default">
                          <i class="fa fa-truck"></i>
                      </span>
                    </div>
                    <input required type="text"  class="form-control left-border" id="truck_number" name="truck_number"
                    placeholder="Truck Number"
                    value="{{ $lha->truck_number }}" style="text-transform:uppercase">
                </div>
                @if($errors->has('truck_number'))
                    <span class="text-danger">{{ $errors->first('truck_number') }}</span>
                @endif
            </div>
        </div>
        
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="hire">Hire</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text input-grp-text" id="inputGroup-sizing-default">
                          <i class="fa fa-inr"></i>
                      </span>
                    </div>
                    <input required type="number"  min="0" class="form-control left-border" id="hire" name="hire"
                           placeholder="Hire"
                           value="{{ $lha->hire }}">
                </div>
                @if($errors->has('hire'))
                    <span class="text-danger">{{ $errors->first('hire') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group m-form__group">
                <label for="vendor_id">Vendor</label>
                <select name="vendor_id" id="vendor_id" class="form-control select">
                    @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}" {{$vendor->id == $lha->vendor_id ? 'selected="selected"': ''}}>
                            {{ $vendor->name }} - {{$vendor->company_name}}</option>
                    @endforeach
                </select>
                @if($errors->has('vendor_id'))
                    <span class="text-danger">{{ $errors->first('vendor_id') }}</span>
                @endif
                {{--<label for="vendor_id">Vendor</label>--}}
                {{--<select name="vendor_id" id="vendor_id" class="form-control">--}}
                {{--<option value="{{$lha->vendor_id ?? ''}}"{{$lha->vendor_id ? 'selected="selected"' : ''  }}>{{$lha->vendor_id ? $lha->vendor->name : ''}}</option>--}}
                {{--</select>--}}
                {{--@if($errors->has('vendor_id'))--}}
                {{--<span class="m-form__help twtext-red">{{ $errors->first('vendor_id') }}</span>--}}
                {{--@endif--}}
                <div class="m-separator m-separator--space m-separator--dashed"></div>
               {{-- <a href="" class="pull-right" data-toggle="modal" data-target="#createVendor">
                   <u>Create Vendor</u>
               </a> --}}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $('#date, #expected_delivery_date').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });

        $('.select').select2();
    </script>
@append
