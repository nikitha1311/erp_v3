@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-header">
                        <h5>Create Customer</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route("customers.update",$customer->id) }}" method="post">
                            @method('PATCH')
                            {{csrf_field()}}
                            <div class="form-group">
                               <label for="name">Name</label>
                               <input type="text" class="form-control" name="name"id="name" value="{{$customer->name}}" placeholder="Name" required>
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                              <label for="code">Code</label>
                              <input type="text" class="form-control" name="code"id="code"  value="{{$customer->code}}" placeholder="Code" required>

                                @if($errors->has('code'))
                                    <span class="text-danger">{{ $errors->first('code') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address"  value="{{$customer->address}}" placeholder="Address" required>

                                @if($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                              </div>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" @if ($customer->is_consignor) == 1 ?? checked @endif id="is_consignor" name="is_consignor">
                              <label class="form-check-label" for="is_consignor">Consignor</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"@if ($customer->is_consignee) == 1 ?? checked @endif id="is_consignee" name="is_consignee">
                                <label class="form-check-label" for="is_consignee">Consignee</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"@if ($customer->is_billed_on) == 1 ?? checked @endif id="is_billed_on" name="is_billed_on">
                                <label class="form-check-label" for="is_billed_on">Is Billed On</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('customers.index') }}" type="button" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection