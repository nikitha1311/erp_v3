@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>Customer Contract Details</h5>

                    <div>
                        <a href="{{ route('contracts.edit', [$customer->id,$contract->id]) }}" class="btn btn-secondary">
                            <i class="fa fa-edit mr-2"></i>
                            <span>Edit</span>
                        </a>
                        <a href="{{ route('contracts.index',$customer->id) }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left mr-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                          <label for="id">Contract Id</label>
                        <input type="text" value="{{ $contract->id }}" class="form-control" id="id"  placeholder="Id" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" value="{{ $customer->name }}" class="form-control" id="name"  placeholder="Name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" value="{{ $contract->description }}" class="form-control" id="desc"  placeholder="Description" disabled>
                        </div>
                        <div class="form-group">
                            <label for="signed_on">Signed On</label>
                            <input type="text" value="{{ $contract->signed_at }}" disabled class="form-control" id="signed_on" name='signed_on' placeholder="Signed on" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="valid_till">Valid Till</label>
                            <input type="text" value="{{ $contract->valid_till }}" disabled class="form-control" id="valid_till" name='valid_till' placeholder="Valid Till" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" value="{{ $contract->status }}" class="form-control" id="status"  placeholder="Status" disabled>
                        </div>
                        <div class="form-group">
                            <label for="created_by">Created By</label>
                            <input type="text" value="{{ $contract->created_by }}" class="form-control" id="created_by"  placeholder="Created By" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection