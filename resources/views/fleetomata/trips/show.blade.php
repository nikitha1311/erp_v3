@extends('layouts.app')
@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
    rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css">
@endsection
@section('content')
    <div class="panel">
        <div class="panel-header">
            <h5> {{ $trip->id() }}
                <a href="{{ url("fleetomata/trucks/{$trip->truck_id}") }}">{{ $trip->truck->number }}</a></h5>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>When</th>
                    <td>
                        @if(!$trip->when)
                                <a href="#"
                                   class="trip-editable"
                                   data-type="text"
                                   data-pk="{{ $trip->id }}"
                                   data-name="when"
                                   data-url="{{ url("fleetomata/trips/{$trip->id}") }}"
                                   data-title="Update Trip Date">
                                    Not Updated
                                </a>
                            @else
                            {{-- @role('admin')
                            <a href="#"
                               class="trip-editable"
                               data-type="datetime"
                               data-pk="{{ $trip->id }}"
                               data-name="when"
                               data-url="{{ url("fleetomata/trips/{$trip->id}") }}"
                               data-title="Update Trip Date">
                                {{ $trip->when->toDayDateTimeString() }}
                            </a>
                            @else --}}
                                {{ $trip->when->toDayDateTimeString() }}
                                {{-- @endrole --}}
                            @endif
                    </td>
                    <th>Accounting Date</th>
                    <td>
                        @if(!$trip->accounting_date)
                            <a href="#"
                               class="trip-editable"
                               data-type="text"
                               data-pk="{{ $trip->id }}"
                               data-name="accounting_date"
                               data-url="{{ url("fleetomata/trips/{$trip->id}") }}"
                               data-title="Update Accounting Date">
                                Not Updated
                            </a>
                            @else
                            {{-- @role('admin')
                            <a href="#"
                               class="trip-editable"
                               data-type="datetime"
                               data-pk="{{ $trip->id }}"
                               data-name="accounting_date"
                               data-url="{{ url("fleetomata/trips/{$trip->id}") }}"
                               data-title="Update Accounting Date">
                                {{ $trip->accounting_date->toDayDateTimeString() }}
                            </a>
                            @else --}}
                                 {{$trip->accounting_date->toDayDateTimeString()}}
                                {{-- @endrole --}}
                            @endif
                    </td>
                    <th>Completed Date</th>
                    <td>
                        @if(!$trip->completed_at)
                            <a href="#"
                               class="trip-editable"
                               data-type="text"
                               data-pk="{{ $trip->id }}"
                               data-name="completed_at"
                               data-url="{{ url("fleetomata/trips/{$trip->id}") }}"
                               data-title="Update Completed Date">
                                Not Updated
                            </a>
                        @else

                            {{ $trip->completed_at->toDayDateTimeString() }}
                            {{-- @endrole --}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Billing</th>
                    <td><i class="fa fa-inr"></i> {{ numberToCurrency($trip->billing) }}</td>
                    <th>Collection</th>
                    <td><i class="fa fa-inr"></i> {{ numberToCurrency($trip->collection) }}</td>
                    <th>Created By</th>
                    <td>
                        {{ $trip->createdBy->name }}
                        {{ $trip->created_at->toDayDateTimeString() }}
                    </td>
                </tr>
            </table>
            <div class="row twtext-center twborder-grey-lighter twpb-4">
                <div class="col">
                    <h3>Budgeted Kms</h3>
                    <h4>{{ numberToCurrency($trip->kms) }}</h4>
                </div>
                <div class="col">
                    <h3>Enroute</h3>
                    <h4>{{ numberToCurrency($trip->orders->sum('enroute')) }}</h4>
                </div>
                <div class="col">
                    <h3>Diesel Liters</h3>
                    <h4>{{ numberToCurrency($trip->orders->sum('diesel_liters')) }}</h4>
                </div>
            </div>
            <hr>
            <div class="row twtext-center twborder-grey-lighter twpb-4">
                <div class="col-md-3">
                    <h3>Diesel</h3>
                    <h4>{{ numberToCurrency($trip->ledgers->where('type','Diesel')->sum('amount')) }}</h4>
                </div>
                <div class="col-md-3">
                    <h3>Fastag</h3>
                    <h4>{{ numberToCurrency($trip->ledgers->where('type','Fastag')->sum('amount')) }}</h4>
                </div>
                <div class="col-md-3">
                    <h3>Happay</h3>
                    <h4>{{ numberToCurrency($trip->ledgers->where('type','Happay')->sum('amount')) }}</h4>
                </div>
                <div class="col-md-3">
                    <h3>Total</h3>
                    <h4>{{ numberToCurrency($trip->ledgers->sum('amount')) }}</h4>
                </div>
            </div>
        </div>
    </div>
    @include('fleetomata.trips.partials._orders',[
        'orders' => $trip->orders
    ])

    @include('fleetomata.trips.partials._createOrder')

    @include('fleetomata.vouchers.partials._index',[
        'truck' => $trip->truck,
        'trip' => $trip
    ])
    @include('fleetomata.trips.partials._income',[
       'orders' => $trip->orders
    ])

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
    <script>

        // $.fn.editable.defaults.ajaxOptions = {type: "PATCH"};
        // $('.trip-editable').editable();
        // $('.modal select').css('width', '100%');
        // $('#from_id, #to_id').select2();
        // $('#vendor_id').select2({
        //     minimumInputLength: 3,
        //     ajax: {
        //         url: '/select2/vendors',
        //         data: function (params) {
        //             var query = {
        //                 q: params.term,
        //             }
        //             return query;
        //         },
        //         processResults: function (data) {
        //             return {
        //                 results: $.map(data, function (item) {
        //                     return {
        //                         text: item.name + " - " + item.phone,
        //                         id: item.id,
        //                     }
        //                 })
        //             }
        //         }
        //     }
        // });


        $(document).ready(function() {
            $('#from_id, #to_id').select2();
            $('#vendor_id').select2({
                minimumInputLength: 3,
                ajax: {
                    url: '/select2/vendors',
                    data: function (params) {
                        var query = {
                            q: params.term,
                        }
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name + " - " + item.phone,
                                    id: item.id,
                                }
                            })
                        }
                    }
                }
            });
        });
    </script>
@append
