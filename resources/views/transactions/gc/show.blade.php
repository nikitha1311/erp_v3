<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Goods Consignment Notes
            <small> {{ $transaction->goodsConsignmentNotes->pluck('number') }} </small>
        </h5>
        <div>
            <ul class="d-flex justify-content-between">
{{--                <li>--}}
{{--                    <button class="btn btn-sm btn-default" href="twfloat-left" data-toggle="modal"--}}
{{--                            data-target="#attachGC">--}}
{{--                        <i class="fa fa-link"></i>--}}
{{--                        &nbsp;Attach--}}
{{--                    </button>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ url("/goods-consignment-notes/create?t_id={$transaction->id}") }}">
                        <button class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            &nbsp;Create
                        </button>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <button class="btn btn-sm btn-info" onclick="$('#m_accordion_4 .m-accordion__item-body').collapse('hide')">--}}
{{--                        <i class="fa fa-arrow-circle-up"></i>--}}
{{--                    </button>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div  id="m_accordion_4" role="tablist">
            @foreach($transaction->goodsConsignmentNotes as $gc)
                    <div role="tab" id="{{ $gc->number }}"
                        data-toggle="collapse" data-target="#{{ $gc->number }}_body" href="#{{ $gc->number }}_body" aria-expanded="false">
                            <span class="m-accordion__item-title @if($gc->isNotApproved()) text-danger @endif">
                                {{ $gc->number }}
                             </span>
                    </div>
                        <div id="{{ $gc->number }}_body" role="tabpanel">
                                     <div class="d-flex justify-content-end">
                                        @if($gc->isNotApproved() || auth()->user()->hasRole('admin'))
                                            <ul class="d-flex justify-content-between">
                                                <li class="d-flex justify-content-between">
                                                    @if(!$gc->trashed())
                                                        <a href="{{ url("goods-consignment-notes/{$gc->id}/edit") }}"
                                                           class="btn btn-sm btn-primary">
                                                            <i class="fa fa-edit"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                    @endif
                                                </li>
                                                <li class="d-flex">
                                                    <form action="{{ url("goods-consignment-notes/{$gc->id}") }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-sm btn-danger">
                                                            @if($gc->trashed())
                                                                <i class="fa fa-rotate-left"></i>
                                                                <span>Restore</span>
                                                            @else
                                                                <i class="fa fa-trash"></i>
                                                                <span>Delete</span>
                                                            @endif
                                                        </button>
                                                    </form>
                                                </li>
                                                <li class="d-flex">
                                                    @if($gc->isNotApproved() && !$gc->trashed())
                                                        <form action="{{ url("goods-consignment-notes/{$gc->id}/approvals") }}"
                                                              method="POST">
                                                            {!! csrf_field() !!}
                                                            <button href="{{ url("goods-consignment-notes/{$gc->id}/edit") }}"
                                                                    class="btn btn-sm btn-success">
                                                                <i class="fa fa-check"></i>
                                                                <span>Approve</span>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </li>
                                            </ul>
                                         @endif
                                     </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 table-responsive">
                                    <table class="table table-bordered printGC">
                                        <tr>
                                            <td>Date</td>
                                            <td class="">{{ $gc->date->format('d-m-Y') }}</td>
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
                            <hr>
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
                                        <p>
                                            <b>Approved By :</b> {{$gc->approvalStatus()->approvedBy->name}}
                                        </p>
                                        <p>
                                            <b>Approved At
                                                :</b> {{ $gc->approvalStatus()->created_at->toDayDateTimeString() }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-md-4 printGC">
                                    <p>
                                        <b>Acknowledgement :</b> {{$gc->ackStatus() }}
                                    </p>
                                </div>
                            </div>
                            <hr>
{{--                                  @include('files.partials._index',[--}}
{{--                                       'files' => $gc->files,--}}
{{--                                          'url' => url("goods-consignment-notes/{$gc->id}/files"),--}}
{{--                                              'number' => $gc->number--}}
{{--                                    ])--}}
                </div>
            </div>
        @endforeach
                </div>


    <div class="panel-footer">

    </div>

</div>


