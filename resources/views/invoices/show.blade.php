@extends('layouts.app')
@section('head')

@endsection
@section('content')

    <div>
        <div>
            @if(!$invoice->isOpenForModification())
                <a target="_blank" href="{{ url("invoices/{$invoice->id}/print") }}" class="btn btn-info">
                    <i class="fa fa-eye"></i>
                    <span>Preview</span>
                </a>
            @endif
            <button class="btn btn-primary" onclick="location.reload()">
                <i class="fa fa-refresh"></i>
                <span>Refresh</span>
            </button>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item twtext-center">
                            <b>Invoice Details</b>
                        </li>
                        <li class="list-group-item">
                            <p><b>ID :</b> {{ $invoice->id() }}</p>
                        </li>
                        <li class="list-group-item">
                            <p><b>Date : </b>{{ $invoice->date->format('d-m-Y') }}</p>
                        </li>
                        <li class="list-group-item">
                            <p>
                                <b>Customer : </b>
                                <a href="/customers/{{ $invoice->customer_id }}">
                                    {{ $invoice->customer->name ." - ". $invoice->customer->code }}
                                </a>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p><b>Number : </b>{{ $invoice->number }}</p>
                        </li>
                        <li class="list-group-item">
                            <p><b>Created By : </b>{{ $invoice->createdBy->name }}</p>
                        </li>
                        <li class="list-group-item">
                            <p><b>Created At : </b>{{ $invoice->created_at->toDayDateTimeString() }}</p>
                        </li>
                        <li class="list-group-item">
                            @if($invoice->isOpenForModification() && $invoice->rows->count() == 0)
                                <p>
                                    <b>Total : </b><i class="fa fa-inr"></i>
                                    <a href="#"
                                       class="edit"
                                       id="invoiceTotal"
                                       data-type="number"
                                       data-pk="{{ $invoice->id }}"
                                       data-name="total"
                                       data-url="{{ url("invoices/{$invoice->id}") }}"
                                       data-title="Update Total">
                                        @if($invoice->total)
                                            {{ $invoice->total }}
                                        @endif
                                    </a>
                                </p>
                                <p class="twtext-sm">{{ getIndianCurrency($invoice->total) }}</p>
                            @else
                                <p><b>Total : </b><i
                                        class="fa fa-inr"></i> {{ numberToCurrency($invoice->total) }}</p>
                                <p class="twtext-sm">{{ getIndianCurrency($invoice->total) }}</p>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <p><b>Outstanding : </b><i
                                    class="fa fa-inr"></i> {{ numberToCurrency($invoice->outstanding) }}</p>
                            <p class="twtext-sm">{{ getIndianCurrency($invoice->outstanding) }}</p>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-lg-4">
                    <ul class="list-group">
                        <li class="list-group-item twflex twjustify-between">
                            <b>Invoice Submission Status</b>
                            <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#updateInvoiceSubmission">
                                <i class="fa fa-edit"></i>
                            </button>
                        </li>
                        @forelse($invoice->statuses as $status)
                            <li class="list-group-item">
                                <p><b>{{ $status }} - </b>{{ $status->remarks }}</p>
                                <span class="text-muted">{{ $status->createdBy->name }}</span>
                            </li>
                        @empty
                            <li class="list-group-item">No Status</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

{{--@dump($invoice->customer->transactions)--}}

    @if($invoice->isOpenForModification())
        <transaction-rows-adder :invoice="{{ $invoice }}"></transaction-rows-adder>
    @endif

    @include('invoices.partials._rows')

    @include('modals.invoices.updateInvoiceSubmission')


@endsection
@section('scripts')
    <script src="{{ asset('js/bootstrap-editable.min.js') }}"></script>
    <script>
        $.fn.editable.defaults.ajaxOptions = {type: "PATCH"};

        @if($invoice->isOpenForModification())
        $('.edit').editable();
        @endif
    </script>
@endsection


