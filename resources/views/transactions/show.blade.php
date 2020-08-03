@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Loading Hire Agreements
                    </h5>
                    <div>

                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
{{--                            <tr>--}}
{{--                                <th scope="col">ID</th>--}}
{{--                                <th scope="col">Branch</th>--}}
{{--                                <th scope="col">Lha Number</th>--}}
{{--                                <th scope="col">From</th>--}}
{{--                                <th scope="col">To</th>--}}
{{--                                <th scope="col">Truck Type</th>--}}
{{--                                <th scope="col">Hire</th>--}}
{{--                                <th scope="col">Truck Number</th>--}}
{{--                                <th scope="col">Vendor</th>--}}
{{--                                <th scope="col">Driver Name</th>--}}
{{--                                <th scope="col">Driver Phone</th>--}}
{{--                                <th scope="col">Owner Name</th>--}}
{{--                                <th scope="col">Owner Phone</th>--}}
{{--                                <th scope="col">Loading Detention</th>--}}
{{--                                <th scope="col">Loading Reported</th>--}}
{{--                                <th scope="col">Loading Released</th>--}}
{{--                                <th scope="col">Unloading Detention</th>--}}
{{--                                <th scope="col">Unloading Reported</th>--}}
{{--                                <th scope="col">Unloading Released</th>--}}
{{--                                <th scope="col">Created By</th>--}}
{{--                                <th scope="col">Deleted By</th>--}}
{{--                            </tr>--}}
                            </thead>
                            <tbody>

                            @foreach($transaction->loadingHireAgreements as $lha)
                                <div class="m-accordion__item">
                                    <div class="m-accordion__item-head collapsed" role="tab" id="{{ $lha->number }}"
                                         data-toggle="collapse" data-target="#{{ $lha->number }}_body" href="#{{ $lha->number }}_body"
                                         aria-expanded="false">
{{--                        <span class="m-accordion__item-title @if($lha->isNotApproved()) text-danger @endif">--}}
                            {{ $lha->number }}
                            @if($transaction->lha_id == $lha->id)
                                <i class="fa fa-star"></i>
                            @endif
                            <span class="m-badge m-badge--small m-badge--success m-badge--rounded">{{$lha->type()}}</span>
{{--                        </span>--}}
                                        <span class="m-accordion__item-mode"></span>
                                    </div>
                                    <div class="m-accordion__item-body collapse" id="{{ $lha->number }}_body" role="tabpanel"
                                         aria-labelledby="m_accordion_3_item_1_head" data-parent="#m_accordion_3" style="">
                                        <div class="m-accordion__item-content">
                                            <div class="pull-right">
                                                <a onclick="printLHA({{$lha->id}})">
                                                    <button class="btn btn-sm btn-primary">
                                                        <i class="fa fa-print"></i>
                                                    </button>
                                                </a>
                                            </div>
                                            <tr>
                                                <td class="w-25">Date</td>
                                                <td>{{ $lha->date }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25">LHA Number</td>
                                                <td><b>{{ $lha->number }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Expected Delivery Date</td>
                                                <td>{{ $lha->expected_delivery_date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Branch</td>
                                                <td>{{ $lha->branch->name }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="twtext-center">Route</th>
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
                                                <th colspan="2" class="twtext-center">Placement</th>
                                            </tr>
                                            <tr>
                                                <td>Truck Number</td>
                                                <td>{{ $lha->truck_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hire</td>
                                                <td>{{ $lha->hire }}</td>
                                            </tr>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-header">
                    <h5>
                        Goods Consignment Notes
                    </h5>
                    <div>

                    </div>
                </div>
                <div class="panel-body">
                    <div id="accordion">
                        @foreach($transaction->goodsConsignmentNotes as $gc)
                            <div class="panel">
                                <div class="panel-header" id="headingOne" data-toggle="collapse" data-target="#{{$gc->number}}" aria-expanded="true" aria-controls="{{$gc->number}}">
                                    <h5 class="mb-0">
                                        {{$gc->number}}
                                    </h5>
                                </div>
                                
                                <div id="{{$gc->number}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 table-responsive">
                                                <table class="table table-bordered printGC">
                                                    <tr>
                                                        <td>Date</td>
                                                        <td class="">{{ $gc->date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GC Number</td>
                                                        <td class=""><b>{{ $gc->number }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Branch</td>
                                                        <td class="">{{ $gc->branch->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Consignor</td>
                                                        <td> {{ $gc->consignor->name }} - <b> {{ $gc->consignor->code }} </b>
                                                            - {{$gc->consignor->address}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Consignee</td>
                                                        <td> {{ $gc->consignee->name }} - <b> {{ $gc->consignee->code }} </b>
                                                            - {{$gc->consignee->address}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Billed On</td>
                                                        <td>{{ $gc->billedOn->name }} - <b> {{ $gc->billedOn->code }} </b>
                                                            - {{$gc->billedOn->address}} </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-12 col-lg-6 table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td>Invoice Number</td>
                                                        <td>{{ $gc->invoice_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Value of Cargo</td>
                                                        <td>{{ $gc->value }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GST Number</td>
                                                        <td>{{ $gc->gst_number ?? '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="twtext-center" colspan="2">Description of Materials</th>
                                                    </tr>
                                                    @forelse(json_decode($gc->desc,true) ?? collect() as $row)
                                                        <tr>
                                                            <td>
                                                                <p>{{ $row['no_of_articles']}}</p>
                                                            </td>
                                                            <td>
                                                                <p>{{ $row['desc']}}</p>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="2">No description entered.</td>
                                                        </tr>
                                                    @endforelse
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>
                                                    <b>Created By :</b> {{$gc->createdBy->name}}
                                                </p>
                                                <p>
                                                    <b>Created At :</b> {{ $gc->created_at->toDayDateTimeString() }}
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                @if($gc->isApproved())
                                                    {{-- <p>
                                                        <b>Approved By :</b> {{$gc->approvalStatus()->approvedBy->name}}
                                                    </p>
                                                    <p>
                                                        <b>Approved At
                                                            :</b> {{ $gc->approvalStatus()->created_at->toDayDateTimeString() }}
                                                    </p> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
