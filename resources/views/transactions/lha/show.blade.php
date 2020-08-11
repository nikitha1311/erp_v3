
<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Loading Hire Agreements
            <small> {{ $transaction->loadingHireAgreements->pluck('number') }} </small>
        </h5>
        <div>
            <ul class="d-flex justify-content-between">
{{--                <li>--}}
{{--                    <button class="btn btn-sm btn-default" href="twfloat-left" data-toggle="modal"--}}
{{--                            data-target="#attachLHA">--}}
{{--                        <i class="fa fa-link"></i>--}}
{{--                        &nbsp;Attach--}}
{{--                    </button>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ url("/loading-hire-agreements/create?t_id={$transaction->id}") }}">
                        <button class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            &nbsp;Create
                        </button>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <button class="btn btn-sm btn-info"--}}
{{--                            onclick="$('#m_accordion_3 .m-accordion__item-body').collapse('hide')">--}}
{{--                        <i class="fa fa-arrow-circle-up"></i>--}}
{{--                    </button>--}}
{{--                </li>--}}

            </ul>
        </div>
    </div>
    <div class="panel-body">
        @foreach($transaction->loadingHireAgreements as $lha)
            <div>
                <div role="tab" id="{{ $lha->number }}"
                        data-toggle="collapse" data-target="#{{ $lha->number }}_body" href="#{{ $lha->number }}_body"
                        aria-expanded="false">
                    <span class=" @if($lha->isNotApproved()) text-danger @endif">
                        {{ $lha->number }}
                        @if($transaction->lha_id == $lha->id)
                            <i class="fa fa-star"></i>
                        @endif
                        <span>{{$lha->type()}}</span>
                    </span>
                    <span></span>
                </div>
                <div class="collapse" id="{{ $lha->number }}_body" role="tabpanel">
                    <div>
                        @include('transactions.lha.partials._lha')


                    </div>
                </div>
            </div>

        @endforeach
    </div>

</div>

{{--@include('modals.attachLHAtoTransaction')--}}



