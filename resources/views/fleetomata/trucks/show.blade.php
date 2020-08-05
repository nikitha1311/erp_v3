@extends('layouts.app')
@section('content')

<div class="panel">
    <div class="panel-header">
        <h5>
            {{$truck->number}}
        </h5>
        <div>
            <a href="{{ route('trucks.edit',$truck->id) }}" class="btn btn-success">
                <i class="fa fa-pencil mr-2"></i>
                <span>Edit</span>
            </a>
            <a href="#" class="btn btn-primary">
                <span>In Trip</span>
            </a>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Trips List
        </h5>
        <div>
            <ul>
                <li>
                    <form action="{{ url("fleetomata/trips") }}" method="POST">
                        @csrf
                        <input type="text" name="truck_id" value="{{ $truck->id }}" hidden>
                        <button class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            <span class="twpl-1">Create Trip</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered" id="truck_trip_table">
            <thead>
            <tr>
                <th>ID</th>
                <th>When</th>
                <th>Details</th>
                <th>Billed</th>
                <th>Collection</th>
    {{--                <th>Expense</th>--}}
                <th>Trip Days</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($truck->trips as $trip)
                <tr>
                    <td>
                        {{ $trip->id() }}
                        @if($trip->isActive())
                            <span class="badge badge-success">Active</span>
                        @endif
                    </td>
                    <td>{{ optional($trip->when)->toFormattedDateString() }}</td>
                    <td>{{ $trip->info() }}</td>
                    <td>{{ numberToCurrency($trip->billing) }}</td>
                    <td>{{ numberToCurrency($trip->collection) }}</td>
    {{--                    <td>{{ numberToCurrency($trip->ledgers()->sum('amount')) }}</td>--}}
                    <td>{{ $trip->days() }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ url("fleetomata/trips/{$trip->id}") }}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="panel-footer">

    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#truck_trip_table').DataTable();
        });
    </script>
@endsection