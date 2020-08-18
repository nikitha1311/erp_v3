@extends('layouts.app')
@section('head')

@endsection
@section('content')

<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Create an WSP Invoice <small></small>

        </h5>
        <div>
            <ul>
                <li>

                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{ url("wsp-invoices") }}" method="POST">
            {!! csrf_field() !!}


            @include('invoices.partials._create')

            <div class="form-group">
                <label for="total">Invoice Amount</label>
                <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-inr"></i>
                            </span>
                    <input required type="number" min="0" step="0.01" class="form-control" id="total"
                           name="total"
                           placeholder="Invoice Amount"
                           value="{{ old('total') }}">
                </div>
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
            </div>
            <div class="panel-footer">
                @include('components._formButtons',[
                    'primaryText' => 'Create'
                     ])
            </div>
        </form>
    </div>

</div>
@endsection
