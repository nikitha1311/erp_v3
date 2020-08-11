<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            {{ $transaction->id() }} - {{ $transaction->date->format('d-m-Y') }}
            <small>
                {{ $transaction->trashed() ? "Deleted at {$transaction->deleted_at->toDayDateTimeString()}" : '' }}
            </small>
        </h5>
        <div>
            <ul class="d-flex justify-content-between">
                @if($transaction->isEditable() || auth()->user()->hasRole('admin'))
                    @if(!$transaction->trashed() && !$transaction->invoice)
                        <li class="d-flex">
                            <a href="{{ url("transactions/{$transaction->id}/edit") }}"
                               >
{{--                                <button class="btn btn-primary">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                    <span>Edit</span>--}}
{{--                                </button>--}}
                            </a>
                        </li>
                    @endif
                    <li class="d-flex justify-content-between">
                        <form action="{{ url("transactions/{$transaction->id}") }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
{{--                            <button class="btn-sm btn btn-danger">--}}
{{--                                @if($transaction->trashed())--}}
{{--                                    <i class="fa fa-rotate-left"></i>--}}
{{--                                    <span>Restore</span>--}}
{{--                                @else--}}
{{--                                    <i class="fa fa-trash"></i>--}}
{{--                                    <span>Delete</span>--}}
{{--                                @endif--}}
{{--                            </button>--}}
                        </form>
                    </li>
                @endif
                @if($transaction->isNotApproved() && !$transaction->trashed())
                    <li class="d-flex justify-content-between">
                        <form action="{{ url("transactions/{$transaction->id}/approvals") }}" method="POST">
                            {!! csrf_field() !!}
                            <button href="{{ url("transactions/{$transaction->id}/edit") }}"
                                    class="m-portlet__nav-link btn-sm btn btn-success">
                                <i class="fa fa-check"></i>
                                <span>Approve</span>
                            </button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col col-lg-6 twflex twflex-col twjustify-around">
                <table class="table table-bordered">
                    <tr>
                        <th>Customer</th>
                        <td>
                            <p>{{ $transaction->customer ? $transaction->customer->name .'-'.$transaction->customer->code : 'Not Update' }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Route</th>
                        <td>
                            @if($transaction->route)
                                <div>
                                    <p class="twtext-grey-darker twtext-sm">
                                        <a href="/contracts/{{ $transaction->route->contract_id}}/routes/{{$transaction->route->id}}">Route#{{$transaction->route->id}}</a>
                                    </p>
                                    <p><b>From : </b>{{ $transaction->route->from->formatted_address }}</p>
                                    <p><b>To : </b>{{ $transaction->route->to->formatted_address }}</p>
                                    <p><b>Truck Type : </b>{{ optional($transaction->route->truckType)->name }}</p>
                                </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Billing Rate</th>
                        <td>
                            @can('see transaction billing')
                                <div>
                                    <p>
                                        <a href="#"
                                           id="billingRate"
                                           data-type="select"
                                           data-pk="{{ $transaction->id }}"
                                           data-name="billing_id"
                                           data-url="{{ url("transactions/{$transaction->id}/finances") }}"
                                           data-title="Select Billing Rate">
                                            @if($transaction->billingRate)
                                                Rs. {{ optional($transaction->billingRate)->rate ." wef - ". optional($transaction->billingRate)->wef->format('d-m-Y') ." - desc -".
                                optional($transaction->billingRate)->description }}
                                            @endif
                                        </a>
                                    </p>
                                </div>
                            @else
                                <div class="m-alert__text">
                                    <strong>No Permission.</strong><br> You do not have the permission to view
                                    rates.
                                </div>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Invoice Status
                        </th>
                        <td>
{{--                            {{ $transaction->invoiceStatus() }}--}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col col-lg-6">
                @can('see transaction billing')
                    <table class="table table-bordered">
                        <tr>
                            <td class="w-50">Manual Freight</td>
                            <td class="w-50">
                                <a href="#"
                                   class="edit"
                                   data-type="text"
                                   data-name="manual_freight"
                                   data-pk="{{ $transaction->id }}"
                                   data-url="{{ url("/transactions/{$transaction->id}/finances") }}"
                                   data-title="Enter Manual Freight Charges">
                                    {{ $transaction->manual_freight }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">Loading Charges</td>
                            <td class="w-50">
                                <a href="#"
                                   class="edit"
                                   data-type="text"
                                   data-name="loading"
                                   data-pk="{{ $transaction->id }}"
                                   data-url="{{ url("/transactions/{$transaction->id}/finances") }}"
                                   data-title="Enter Loading Charges">
                                    {{ $transaction->loading }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Unloading Charges</td>
                            <td>
                                <a href="#"
                                   class="edit"
                                   data-type="text"
                                   data-name="unloading"
                                   data-pk="{{ $transaction->id }}"
                                   data-url="{{ url("/transactions/{$transaction->id}/finances") }}"
                                   data-title="Enter Unloading Charges">
                                    {{ $transaction->unloading }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Detention Charges</td>
                            <td>
                                <a href="#"
                                   class="edit"
                                   data-type="text"
                                   data-name="detention"
                                   data-pk="{{ $transaction->id }}"
                                   data-url="{{ url("/transactions/{$transaction->id}/finances") }}"
                                   data-title="Enter Detention Charges">
                                    {{ $transaction->detention }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Handling Charges</td>
                            <td>
                                <a href="#"
                                   class="edit"
                                   data-type="text"
                                   data-name="handling"
                                   data-pk="{{ $transaction->id }}"
                                   data-url="{{ url("/transactions/{$transaction->id}/finances") }}"
                                   data-title="Enter Handling Charges">
                                    {{ $transaction->handling }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Other Charges</td>
                            <td>
                                <a href="#"
                                   class="edit"
                                   data-type="text"
                                   data-name="others"
                                   data-pk="{{ $transaction->id }}"
                                   data-url="{{ url("/transactions/{$transaction->id}/finances") }}"
                                   data-title="Enter Other Charges">
                                    {{ $transaction->others }}
                                </a>
                            </td>
                        </tr>
                        {{--<tr>--}}
                        {{--<th>Tax</th>--}}
                        {{--<td>--}}
                        {{--{{ $transaction->taxType() }} - {{ $transaction->taxToString() }}--}}
                        {{--@if($transaction->isEditable())--}}
                        {{--<form class="pull-right"--}}
                        {{--action="{{ url("transactions/{$transaction->id}/tax-slabs-remove") }}"--}}
                        {{--method="post">--}}
                        {{--{!! csrf_field() !!}--}}
                        {{--<button class="btn btn-sm btn-danger">--}}
                        {{--<i class="fa fa-times"></i>--}}
                        {{--</button>--}}
                        {{--</form>--}}
                        {{--@endif--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <th>Total</th>
                            <td>{{ $transaction->total }}</td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td>
                                <a href="#"
                                   class="edit"
                                   data-type="textarea"
                                   data-name="remarks"
                                   data-url="{{ url("/transactions/{$transaction->id}/finances") }}"
                                   data-pk="{{ $transaction->id }}">
                                    {{ $transaction->remarks }}
                                </a>
                            </td>
                        </tr>
                    </table>
                @else
                    <div class="alert alert-danger"
                         role="alert">
                        <div>
                            <i class="flaticon-exclamation-1"></i>
                            <span></span>
                        </div>
                        <div>
                            <strong>No Permission.</strong><br> You do not have the permission to view rates.
                        </div>
                    </div>
                @endcan
            </div>
        </div>

    </div>

</div>
