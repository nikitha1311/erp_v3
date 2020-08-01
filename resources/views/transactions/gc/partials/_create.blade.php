<div>
    <div class="form-row">
        <div class="col-sm-4 mb-3">
            <div class="form-group">
                <label>GC Number</label>
                <input type="text" class="form-control" required name="number" placeholder="Enter GC Number" value="{{$gc->number}}">
                @if($errors->has('number'))
                    <span class="m-form__help twtext-red">{{ $errors->first('number') }}</span>
                @endif
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="form-group">
                <label>Branch</label>
                <select name="branch_id" id="branch_id" required class="form-control">
                    @foreach(branches() as $branch)
                        <option value="{{ $branch->id }}" {{$branch->id == $gc->branch_id ? 'selected="selected"' : ''}}
                        >{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="form-group">
                <label>Date</label>
                <input id="date" type="text" class="form-control" required name="date" id="date" placeholder="Enter Date"
                       value="{{$gc->date ? $gc->date->format('d-m-Y') : ''}}">
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-4 mb-3">
            <div class="form-group">
                <label>Consignor</label>
                <select name="consignor_id" id="consignor_id" required class="form-control select">
                    @foreach(consignors() as $consignor)
                        <option value="{{ $consignor->id }}" {{$consignor->id == $gc->consignor_id ? 'selected="selected"' : ''}} >
                            {{ $consignor->code}}-{{$consignor->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="form-group">
                <label>Consignee</label>
                <select name="consignee_id" id="consignee_id" required class="form-control select">
                    @foreach(consignees() as $consignee)
                        <option value="{{ $consignee->id }}" {{$consignee->id == $gc->consignee_id ? 'selected="selected"':''}}>
                            {{ $consignee->code}}-{{ $consignee->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="form-group">
                <label>Bill On</label>
                <select name="bill_on_id" id="bill_on_id" required class="form-control select">
                    @foreach(billedOn() as $billedOn)
                        <option value="{{ $billedOn->id }}" {{$billedOn->id == $gc->bill_on_id ? 'selected="selected"' : ''}}>
                            {{ $billedOn->code}}-{{ $billedOn->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <desc-of-articles :desc="{{$gc->desc ?? '{}' }}"></desc-of-articles>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Invoice Number</label>
                <input type="text" class="form-control" required
                       name="invoice_number"
                       placeholder="Enter Invoice Number"
                       value="{{$gc->invoice_number}}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>GST Number</label>
                <input type="text" class="form-control" name="gst_number"
                       placeholder="Enter GST Number" value="{{$gc->gst_number}}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>Value of Cargo</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
                    <input type="text" class="form-control" required name="value"
                           placeholder="Enter Value of Cargo" value="{{$gc->value}}">
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    <script>
        $('#date').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
        $(".select").select2();
    </script>
@append
