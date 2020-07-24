@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        Edit Contract Details
                    </h5>
                </div>
                <form action="{{ route("contracts.update",[$customer->id,$contract->id]) }}" method="post">
                    <div class="panel-body">
                        @method('PATCH')
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $contract->description }}"  required placeholder="Description" >
                                @if($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signed_at">Signed at</label>
                                <input type="text" class="form-control" id="signed_at" name='signed_at' value="{{ $contract->signed_at }}" placeholder="Signed at" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="valid_till">Valid Till</label>
                                <input type="text" class="form-control" name="valid_till" id="valid_till" value="{{ $contract->valid_till }}" placeholder="valid till" >
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                        <option value="1" selected>Valid</option>
                                        <option value="0">Invalid</option>
                                </select>
                                @if($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection