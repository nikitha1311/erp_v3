<div class="row">
    <div class="col-md-6 offset-md-6">
        <ul class="d-flex justify-content-between">
            <li class="d-flex">
                @if($transaction)
                    @if($transaction->lha_id != $lha->id)
                        <div>
                            <form action="{{ url("transactions/{$transaction->id}/default-lha") }}"
                                  method="post">
                                @csrf
                                <input type="text" value="{{ $lha->id }}" name="lha_id" hidden>
                                <button class="btn btn-sm btn-primary">
                                    <span>Make <i class="fa fa-star"></i></span>
                                </button>
                            </form>
                        </div>
                    @endif
                @endif
            </li>
            <li class="d-flex">
{{--                @if($lha->isNotApproved() || auth()->user()->hasRole('admin'))--}}
                    @if(!$lha->trashed())
                        <div>
                            <a href="{{ url("loading-hire-agreements/{$lha->id}/edit") }}">
                                <button class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                    <span>Edit</span>
                                </button>
                            </a>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <form action="{{ url("loading-hire-agreements/{$lha->id}") }}"
                              method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger">
                                @if($lha->trashed())
                                    <i class="fa fa-rotate-left"></i>
                                    <span>Restore</span>
                                @else
                                    <i class="fa fa-trash"></i>
                                    <span>Delete</span>
                                @endif
                            </button>
                        </form>
                    </div>
{{--                @endif--}}

            </li>
            <li class="d-flex">
                @if($lha->isNotApproved() && !$lha->trashed())
                    <div>
                        <form action="{{ url("loading-hire-agreements/{$lha->id}/approvals") }}"
                              method="POST">
                            {!! csrf_field() !!}
                            <button class="btn btn-sm btn-success">
                                <i class="fa fa-check"></i>
                                <span>Approve</span>
                            </button>
                        </form>
                    </div>
                @endif

            </li>
        </ul>

    </div>
</div>
<div class="row printLHA{{$lha->id}}">
    <div class="col col-lg-6">
        <div class="table-responsive">
            <table class="table table-bordered table-striped ">
                <tr>
                    <td class="w-25">Date</td>
                    <td>{{ $lha->date->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td class="w-25">LHA Number</td>
                    <td><b>{{ $lha->number }}</b></td>
                </tr>
                <tr>
                    <td>Expected Delivery Date</td>
                    <td>{{ optional($lha->expected_delivery_date)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td>{{ $lha->branch->name }}</td>
                </tr>
                <tr>
                    <th colspan="2">Route</th>
                </tr>
                <tr>
                    <td>Source</td>
                    <td>{{ $lha->from->formatted_address }}</td>
                </tr>
                <tr>
                    <td>To</td>
                    <td>{{ $lha->to->formatted_address }}</td>
                </tr>
                <tr>
                    <td>Truck Type</td>
                    <td>{{ $lha->truckType->name }}</td>
                </tr>
                <tr>
                    <th colspan="2" >Placement</th>
                </tr>
                <tr>
                    <td>Truck Number</td>
                    <td>{{ $lha->truck_number }}</td>
                </tr>
                <tr>
                    <td>Hire</td>
                    <td>{{ $lha->hire }}</td>
                </tr>
                <tr>
                    <td>Vendor</td>
                    <td>
                        {{ $lha->vendor->name }}<br>
                        {{ $lha->vendor->phone }}<br>
                        {{ $lha->vendor->company_name }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col col-lg-6">
        <div class="table-responsive">
            <table class="table table-bordered table-striped ">
                <tr>
                    <td colspan="2">
                        <b>Loading & Unloading Detention Details</b>
                        <a class="float-right updateLHATimestamps"
                           data-toggle="modal"
                           data-lhaid="{{ $lha->id }}"
                           style="margin-top: -5px;"
                           data-target="#updateLHALog{{$lha->id}}">
                            <button class="btn btn-info btn-sm">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="w-50">Loading Detention</th>
                    <td>{{$lha->loading_detention ? $lha->loading_detention." hours" : '-'}}</td>
                </tr>
                <tr>
                    <td>Loading Reported</td>
                    <td>{{ $lha->loading_reported ? $lha->loading_reported->toDayDateTimeString() : 'Not Updated' }}</td>
                </tr>
                <tr>
                    <td>Loading Released</td>
                    <td>{{ $lha->loading_released ? $lha->loading_released->toDayDateTimeString() : 'Not Updated' }}</td>
                </tr>
                <tr>
                    <th>Unloading Detention</th>
                    <td>{{$lha->unloading_detention ? $lha->unloading_detention." hours" : '-'}} </td>
                </tr>
                <tr>
                    <td>Unloading Reported</td>
                    <td>{{ $lha->unloading_reported ? $lha->unloading_reported->toDayDateTimeString() : 'Not Updated' }}</td>
                </tr>
                <tr>
                    <td>Unloading Released</td>
                    <td>{{ $lha->unloading_released ? $lha->unloading_released->toDayDateTimeString() : 'Not Updated' }}</td>
                </tr>
                <tr>
                    <th class="twtext-center" colspan="2">
                        Owner Details
                        <a class="float-right"
                           data-toggle="modal"
                           style="margin-top: -5px;"
                           data-target="#updateLHADriverOwnerDetails{{$lha->id}}">
                            <button class="btn btn-info btn-sm">
                                <i class="fa fa-user-circle-o"></i>
                            </button>
                        </a>
                    </th>
                </tr>
                <tr>
                    <td class="w-50">Owner Name</td>
                    <td class="w-50">
                        {{ $lha->owner_name ?? 'Not Updated' }}
                    </td>
                </tr>
                <tr>
                    <td>Owner Phone</td>
                    <td>
                        {{ $lha->owner_phone ?? 'Not Updated' }}
                    </td>
                </tr>
                <tr>
                    <td>Driver Name</td>
                    <td>
                        {{ $lha->driver_name ?? 'Not Updated' }}
                    </td>
                </tr>
                <tr>
                    <td>Driver Phone</td>
                    <td>
                        {{ $lha->driver_phone ?? 'Not Updated' }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <p><b>Created By : </b> {{$lha->createdBy->name}}</p>
        <p><b>Created at : </b> {{ $lha->created_at->toDayDateTimeString() }}</p>
    </div>
    <div class="col-md-6">
        @if($lha->isApproved())
            <p><b>Approved By : </b> {{ $lha->approvalStatus()->approvedBy->name }}</p>
            <p><b>Approved at
                    : </b> {{ $lha->approvalStatus()->created_at->toDayDateTimeString() }}
            </p>
        @endif
    </div>
</div>
<hr>

@include('modals.updateLHALog')
@include('modals.updateDriverOwnerDetails')

