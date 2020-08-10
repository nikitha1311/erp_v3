@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
    <div class="panel-header">
        <h5>
            Trucks
            <small></small>
        </h5>
        <div>
            <a href="{{ route('trucks.create') }}" class="btn btn-success">
                <i class="fa fa-plus mr-2"></i>
                <span>Create Truck</span>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="truckTable">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Trip Status</th>
                    <th>Trip Days</th>
                    <th>Today Distance</th>
                    <th class="w-25">Location</th>
                    <th>Last Update</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trucks as $truck)
                    <tr>
                        <td>
                            <a href="{{ url("fleetomata/trucks/{$truck->id}") }}">{{ $truck->number }}</a>
                        </td>
                        <td>
                            <a href="{{ url("fleetomata/trips/{$truck->trip_id}") }}">
                                {{ optional($truck->activeTrip)->info() ?? '-' }}
                            </a>
                        </td>
                        <td>{{ optional($truck->activeTrip)->days() ?? '-' }}</td>
                        <td>{{ $truck->today_distance }}</td>
                        <td>
                            {{ $truck->location }}<br>
                        </td>
                        <td>{{ optional($truck->last_seen)->diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('trucks.destroy',$truck->id) }}" method='POST' class="delete_form">
                                @csrf
                                @method('DELETE')
                                <button  type="button" class="fa fa-trash btn btn-danger delete_btn"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>
    <div class="panel-footer">

    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#truckTable').DataTable();
        });
    </script>
@endsection
