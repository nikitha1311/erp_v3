@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                TruckTypes
                <small></small>
            </h5>
            <div>
                <ul>
                    <li>
                        <a href="{{ url("truck-types/create") }}">
                            <button class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                <span>Add</span>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel-body ">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trucks as $truck )
                        <tr>
                            <td>
                                <a href="{{ route('truck-types.show', $truck->id) }}">
                                {{ $truck->id }}
                            </td>
                            <td>
                                {{ $truck->name }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
