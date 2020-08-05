<div class="modal fade" id="createOrder" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Create an Order </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url("/fleetomata/trips/{$trip->id}/orders") }}" method="POST">
                    @csrf
                    <div class="row border-bottom">
                        <div class="col-md-4">
                            <div class="form-group m-form__group">
                                <label for="from_id">From</label>
                                <select name="from_id" id="from_id" class="form-control">
                                    @foreach(locations() as $location)
                                        <option value="{{ $location->id }}">{{ $location->formattedAddress() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group">
                                <label for="from_id">To</label>
                                <select name="to_id" id="to_id" class="form-control">
                                    @foreach(locations() as $location)
                                        <option value="{{ $location->id }}">{{ $location->formattedAddress() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kms">Budgeted Kms</label>
                                <input required type="number" class="form-control" id="kms" name="kms"
                                       placeholder="Budgeted Kms"
                                       value="{{ old('kms') }}">
                                @if($errors->has('kms'))
                                    <span class="help-text text-danger">{{ $errors->first('kms') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row my-2 border-bottom">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Load Type</label>
                                <select required type="text" class="form-control" id="type" name="type">
                                    <option value="0">Full Truck Load</option>
                                    <option value="1">Part Truck Load</option>
                                    <option value="2">Empty</option>
                                </select>
                                @if($errors->has('type'))
                                    <span class="help-text text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group">
                                <label for="vendor_id">Vendor</label>
                                <select name="vendor_id" id="vendor_id" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group">
                                <label for="hire">Hire</label>
                                <input required type="number" class="form-control m-input" id="hire" name="hire"
                                       placeholder="Hire" value="{{ old('hire') }}">
                                @if($errors->has('hire'))
                                    <span class="m-form__help twtext-red">{{ $errors->first('hire') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row my-2 border-bottom">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="loading_charges">Loading Charges</label>
                                <input required type="number" class="form-control" id="loading_charges"
                                       name="loading_charges"
                                       placeholder="Loading Charges"
                                       value="{{ old('loading_charges') }}">
                                @if($errors->has('loading_charges'))
                                    <span class="help-text text-danger">{{ $errors->first('loading_charges') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unloading_charges">Unloading Charges</label>
                                <input required type="number" class="form-control" id="unloading_charges"
                                       name="unloading_charges" placeholder="Unloading Charges"
                                       value="{{ old('unloading_charges') }}">
                                @if($errors->has('unloading_charges'))
                                    <span class="help-text text-danger">{{ $errors->first('unloading_charges') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group">
                                <label for="weight">Weight</label>
                                <div class="input-group">
                                    <input required type="number" min="0" step="0.1" class="form-control m-input"
                                           id="weight" name="weight" autocomplete="weight"
                                           placeholder="Weight" value="{{ old('weight') }}">
                                    <span class="input-group-addon">
                                        MT
                                    </span>
                                </div>
                                @if($errors->has('weight'))
                                    <span class="m-form__help twtext-red">{{ $errors->first('weight') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-4">
                            <div class="form-group m-form__group">
                                <label for="material">Material</label>
                                <input required type="text" class="form-control m-input" id="material" name="material"
                                       placeholder="Material" autocomplete="material"
                                       value="{{ old('material') }}">
                                @if($errors->has('material'))
                                    <span class="m-form__help twtext-red">{{ $errors->first('material') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group">
                                <label for="remarks">Remarks</label>
                                <textarea name="remarks" id="remarks" cols="30" rows="5"
                                          class="form-control">{{ old('remarks') }}</textarea>
                                @if($errors->has('remarks'))
                                    <span class="m-form__help twtext-red">{{ $errors->first('remarks') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Clear</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>