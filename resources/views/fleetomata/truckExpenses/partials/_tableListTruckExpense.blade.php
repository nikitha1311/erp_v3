
<div>
    <table class="table table-bordered dataTable expenses">
        <thead>
        <tr>
            <th>ID</th>
            <th>Expense Date </th>
            <th>Type </th>
            <th>Type Description </th>
            <th>Amount </th>
            <th>Valid Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($expenses as $expense)
            <tr>
                <td> {{ $expense->id }} </td>
                <td> {{ optional($expense->expense_date)->toFormattedDateString() }} </td>
                <td> {{$expense->type}} </td>
                <td> {{$expense->type_description}} </td>
                <td><i class="fa fa-rupee"></i> {{$expense->amount}} </td>
                <td>
                    <p>{{optional($expense->valid_till)->toFormattedDateString()}}</p>
                    <p class="text-sm">{{$expense->valid_till->diffForHumans()}}</p>
                </td>
                <td>
                    @if($expense->isNotApproved())
                        <div>
{{--                            <button class="btn btn-primary" data-toggle="modal" data-target="#createTruckExpense" data-expense={{$expense}}>--}}
{{--                                <i class="fa fa-edit"></i>--}}
{{--                                <span>Edit Exp</span>--}}
{{--                            </button>--}}
                        </div>
{{--                    @role('admin')--}}
                        <div>
                            <form action="{{ url("fleetomata/trucks/{$truck->id}/truck-expenses/{$expense->id}") }}"
                                  method="POST">
                                {!! csrf_field() !!}
                                <button class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                    <span>Approve</span>
                                </button>
                            </form>
                        </div>
{{--                        @endrole--}}
                    @endif
                    @if($expense->isApproved())
                        <p><b>Approved By : </b> {{ $expense->approvalStatus()->approvedBy->name }}</p>
                        <p><b>Approved at
                                : </b> {{ $expense->approvalStatus()->created_at->toDayDateTimeString() }}
                        </p>
                    @endif
                </td>
                <td>
{{--                    @role('admin')--}}
                    @if($expense->isNotApproved())
                        <div>
                            <form action="{{ url("fleetomata/trucks/{$truck->id}/truck-expenses/{$expense->id}") }}"
                                  method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    @endif
{{--                    @endrole--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@section('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('.expenses').DataTable();
        });
    </script>
@endsection
