@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Edit Billing Rate for Route - #{{$route->id}}
                    </h5>
                </div>
                <div class="panel-body">
                    <form action="{{ route("billing-rates.update", [$billingrate->route_id,$billingrate->id]) }}"
                          method="post">
                        @method('PATCH')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="rate">Rate</label>
                            <input type="text" required class="form-control" value="{{$billingrate->rate}}" name='rate'
                                   id="rate" placeholder="Rate">
                            @if($errors->has('rate'))
                                <span class="text-danger">{{ $errors->first('rate') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="wef">Wef</label>
                            <input type="text" class="form-control dmy" value="{{$billingrate->wef->format('d-m-Y')}}"
                                   name='wef' id="wef" placeholder="Wef">
                            @if($errors->has('wef'))
                                <span class="text-danger">{{ $errors->first('wef') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" required class="form-control" value="{{$billingrate->description}}"
                                   name='description' id="description" placeholder="Description">
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
