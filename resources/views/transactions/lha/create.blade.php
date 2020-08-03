@extends('layouts.app')
@section('head')

@endsection
@section('content')


<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Loading Hire Agreements / Create<small></small>

        </h5>
        <div>
            <ul>
                <li>

                </li>
            </ul>
        </div>
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
            <div class="m-separator m-separator--space m-separator--dashed"></div>
        @endif

        <form action="{{ url('/loading-hire-agreements') }}" method="POST">
            @csrf
            <input type="text" name="transaction_id" value="{{ $transaction->id ?? null }}" hidden>

            @include('transactions.lha.partials._create',['lha'=>new \App\Domain\LHAs\Models\LoadingHireAgreement(['type'=>''])])

            <div class="panel-footer">
                @include('components._formButtons', ['primaryText' => 'Create'])
            </div>
        </form>
    </div>

</div>

@endsection
