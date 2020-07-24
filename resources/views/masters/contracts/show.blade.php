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
                        @include('masters.contracts.partials._form',[
                            'contract' => $contract,
                            'disabled' => true
                        ])
                        <div class="form-group">
                            <label for="created_by">Created By</label>
                            <input type="text" value="{{ $contract->createdBy->name }}" class="form-control" id="created_by"  placeholder="Created By" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection