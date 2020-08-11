<div class="panel">
    <div class="panel-header">
        <div class="">
            <ul class="nav nav-pills nav-pills--success" style="margin-bottom: 0px;" role="tablist">
                @foreach($orders as $order)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif" data-toggle="tab"
                            href="#ODR{{ $order->id }}">
                            {{ $order->id() }} - {{ $order->info() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="">
            <ul class="">
                <li class="">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createOrder">
                        <i class="fa fa-plus"></i>
                        <span class="twpl-1">Create Order</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            @foreach($orders as $order)
                <div class="tab-pane fade show @if($loop->first) active @endif" id="ODR{{ $order->id }}" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-bordered m-table">
                                <tr>
                                    <th class="w-25">Vendor</th>
                                    <td>
                                        <a href="{{ url("vendors/{$order->vendor_id}") }}">{{ optional($order->vendor)->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <td>{{ $order->from }}</td>
                                </tr>
                                <tr>
                                    <th>To</th>
                                    <td>{{ $order->to }}</td>
                                </tr>
                                <tr>
                                    <th>Material</th>
                                    <td>{{ $order->material }}</td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>{{ $order->weight }} MT</td>
                                </tr>
                                <tr>
                                    <th>Remarks</th>
                                    <td>{{ $order->remarks }}</td>
                                </tr>
                                <tr>
                                    <th>Pod Status</th>
                                    <td>
                                        @if(!$order->pod_received_date)
                                            <a href="#"
                                               class="trip-editable"
                                               data-type="date"
                                               data-pk="{{ $order->id }}"
                                               data-name="pod_received_date"
                                               data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                               data-title="Update POD Rec Date">
                                                {{ $order->podStatus() }}
                                            </a>
                                        @else
                                            {{ $order->podStatus() }}
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered m-table">
                                <tr>
                                    <th>Hire</th>
                                    <td><i class="fa fa-inr"></i> {{ numberToCurrency($order->hire) }} </td>
                                </tr>
                                <tr>
                                    <th>Outstanding</th>
                                    <td><i class="fa fa-inr"></i> {{ numberToCurrency($order->outstanding) }} </td>
                                </tr>
                                <tr>
                                    <th>Loading Charges</th>
                                    <td>
                                        <i class="fa fa-inr"></i>
                                        <a href="#"
                                           class="trip-editable"
                                           data-type="number"
                                           data-pk="{{ $order->id }}"
                                           data-name="loading_charges"
                                           data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                           data-title="Loading Charges">
                                            {{ $order->loading_charges }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Unloading Charges</th>
                                    <td>
                                        <i class="fa fa-inr"></i>
                                        <a href="#"
                                           class="trip-editable"
                                           data-type="number"
                                           data-pk="{{ $order->id }}"
                                           data-name="unloading_charges"
                                           data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                           data-title="Loading Charges">
                                            {{ numberToCurrency($order->unloading_charges) }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Brokerage</th>
                                    <td>
                                        <i class="fa fa-inr"></i>
                                        <a href="#"
                                           class="trip-editable"
                                           data-type="number"
                                           data-pk="{{ $order->id }}"
                                           data-name="brokerage"
                                           data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                           data-title="Loading Charges">
                                            {{ numberToCurrency($order->brokerage) }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>TDS</th>
                                    <td>
                                        <i class="fa fa-inr"></i>
                                        <a href="#"
                                           class="trip-editable"
                                           data-type="number"
                                           data-pk="{{ $order->id }}"
                                           data-name="tds"
                                           data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                           data-title="Loading Charges">
                                            {{ numberToCurrency($order->tds) }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>POD Remarks</th>
                                    <td>
                                        <a href="#"
                                           class="trip-editable"
                                           data-type="textarea"
                                           data-pk="{{ $order->id }}"
                                           data-name="pod_remarks"
                                           data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                           data-title="Update POD remarks">{{ $order->pod_remarks }}</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-bordered m-table">
                                <tr>
                                    <th class="w-50">L Det</th>
                                    <td>{{$order->loading_detention ? $order->loading_detention." hours" : '-'}}</td>
                                </tr>
                                <tr>
                                    <td>Loading Reported</td>
                                    <td>
                                        @if(!$order->loading_reported)
                                            <a href="#"
                                               class="trip-editable"
                                               data-type="text"
                                               data-pk="{{ $order->id }}"
                                               data-name="loading_reported"
                                               data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                               data-title="Update L - Rep Date">
                                                Not Updated
                                            </a>
                                        @else
                                            {{ $order->loading_reported->toDayDateTimeString() }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Loading Released</td>
                                    <td>
                                        @if(!$order->loading_released)
                                            <a href="#"
                                               class="trip-editable"
                                               data-type="text"
                                               data-pk="{{ $order->id }}"
                                               data-name="loading_released"
                                               data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                               data-title="Update L - Rel Date">
                                                Not Updated
                                            </a>
                                        @else
                                            {{ $order->loading_released->toDayDateTimeString() }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>UL Det</th>
                                    <td>{{$order->unloading_detention ? $order->unloading_detention." hours" : '-'}} </td>
                                </tr>
                                <tr>
                                    <td>Unloading Reported</td>
                                    <td>
                                        @if(!$order->unloading_reported)
                                            <a href="#"
                                               class="trip-editable"
                                               data-type="datetime"
                                               data-pk="{{ $order->id }}"
                                               data-name="unloading_reported"
                                               data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                               data-title="Update UL - Rep Date">
                                                Not Updated
                                            </a>
                                        @else
                                            {{ $order->unloading_reported->toDayDateTimeString() }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Unloading Released</td>
                                    <td>
                                        @if(!$order->unloading_released)
                                            <a href="#"
                                               class="trip-editable"
                                               data-type="datetime"
                                               data-pk="{{ $order->id }}"
                                               data-name="unloading_released"
                                               data-url="{{ url("fleetomata/trips/{$trip->id}/orders/{$order->id}") }}"
                                               data-title="Update UL - Rep Date">
                                                Not Updated
                                            </a>
                                        @else
                                            {{ $order->unloading_released->toDayDateTimeString() }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle">
                                        {{ $order->createdBy->name }}<br>
                                        <span class="twtext-sm">{{ $order->created_at->toDayDateTimeString() }}</span>
                                    </td>
                                    <td>
                                        @role('admin')
                                        <form action="{{ url("fleetomata/trips/{$order->trip_id}/orders/{$order->id}") }}"
                                              method="POST">
                                            @csrf
                                            {!! method_field('DELETE') !!}
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @endrole
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @include('components._audits',[
                        'audits' => $order->audits
                    ])
                </div>
            @endforeach
        </div>
        @if($orders->count() == 0)
            <p>No Orders yet!</p>
        @endif
    </div>
</div>
<div>
    

</div>
