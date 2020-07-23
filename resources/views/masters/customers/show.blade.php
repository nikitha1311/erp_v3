@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>Customer Details</h5>
                    <div>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-secondary">
                            <i class="fa fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ route('customers.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name"id="name" value="{{$customer->name}}" placeholder="Name" disabled>
                          @if($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" value="{{$customer->code}}" name="code"id="code" placeholder="Code" disabled>

                          @if($errors->has('code'))
                              <span class="text-danger">{{ $errors->first('code') }}</span>
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" value="{{$customer->address}}" name="address" id="address" placeholder="Address" disabled>

                          @if($errors->has('address'))
                              <span class="text-danger">{{ $errors->first('address') }}</span>
                          @endif
                        </div>
                      <div class="form-check">
                        <input type="checkbox" disabled @if($customer->is_consignor) == 1 ?? checked  @endif class="form-check-input" id="is_consignor" name="is_consignor">
                        <label class="form-check-label" for="is_consignor">Consignor</label>
                      </div>
                      <div class="form-check">
                          <input type="checkbox" disabled @if($customer->is_consignee) == 1 ?? checked @endif class="form-check-input" id="is_consignee" name="is_consignee">
                          <label class="form-check-label" for="is_consignee">Consignee</label>
                      </div>
                      <div class="form-check">
                          <input type="checkbox" disabled @if($customer->is_billed_on) == 1 ?? checked @endif class="form-check-input" id="is_billed_on" name="is_billed_on">
                          <label class="form-check-label" for="is_billed_on">Is Billed On</label>
                      </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-header">
                    <h6>
                        {{ $customer->name }} / {{ $customer->signed_at }} /
                        <small>{{$customer->valid_till}}</small>
                    </h6>

                    <a href="#" data-toggle='modal' data-target='#add_contract' type="button" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Contract
                    </a>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Description</th>
                                <th>Signed on</th>
                                <th>Valid till</th>
                                <th>Created BY</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">hi</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type='text/javascript'>
    $(document).ready( function () {
        $("#signed_at").datetimepicker();
    } );
</script>
@endsection

<div class="modal fade" id='add_contract' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Contract</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="description"  placeholder="Description" disabled>
                    @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="signed_at">Signed at</label>
                    <input type="text" class="form-control" id="signed_at" name='signed_at' placeholder="Signed at" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="valid_till">Valid Till</label>
                    <input type="text" class="form-control" name="valid_till" id="valid_till" placeholder="valid till" disabled>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

