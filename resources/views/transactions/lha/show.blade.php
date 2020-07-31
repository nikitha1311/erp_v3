
<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Loading Hire Agreements
            <small> {{ $transaction->loadingHireAgreements->pluck('number') }} </small>
        </h5>
        <div>
            <ul>
                <li class="m-portlet__nav-item">
                    <a href="{{ url("/loading-hire-agreements/create?t_id={$transaction->id}") }}">
                        <button class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            &nbsp;Create
                        </button>
                    </a>
                </li>

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
                            <div class="float-right">
                                <a onclick="printLHA({{$lha->id}})">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa fa-print"></i>
                                    </button>
                                </a>
                            </div>
                            @include('transactions.lha.partials._lha')
                        </div>
                    </div>
                </div>

            @endforeach
    </div>
    <div class="panel-footer">

    </div>
</div>




