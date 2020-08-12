@extends('layouts.app')
@section('head')

@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Create GC
            </h5>
        </div>

        <div class="panel-body">
            @if($transaction)
                <div class="d-flex justify-content-between">
                    <p><b>Transaction ID : </b>{{ $transaction->id() }}</p>
                    <p><b>Date : </b>{{ $transaction->date->format('d-m-Y') }}</p>
                    <p>
                        <b>Created By: </b>{{ $transaction->createdBy->name }} <br>
                        <span class="text-muted">{{ $transaction->created_at->toDayDateTimeString() }}</span>
                    </p>
                </div>
            @endif
                <form action="{{ url('/goods-consignment-notes') }}" method="post">
                    {!! csrf_field() !!}
                    <div>
                        <input type="text" name="transaction_id" value="{{ $transaction->id ?? null }}" hidden>
                        @include('transactions.gc.partials._create',['gc'=>new \App\Domain\GCs\Models\GoodsConsignmentNote()])
                    </div>
                @endif
                    
                {!! csrf_field() !!}
                <div>
                    <input type="text" name="transaction_id" value="{{ $transaction->id ?? null }}" hidden>
                    @include('transactions.gc.partials._create',['gc'=>new \App\Domain\GCs\Models\GoodsConsignmentNote()])
                </div>
            </div>
            <div class="panel-footer">
                @include('components._formButtons', ['primaryText' => 'Create'])
            </div>
        </form>
    </div>



@endsection
@section('scripts')

@endsection


