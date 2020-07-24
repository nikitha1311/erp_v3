@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Branch List
                <small></small>
            </h5>
            <div>
                <ul>
                    <li>
                        <a href="{{ url("branches/create") }}">
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
                <table id="branch" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($branches as $branch )
                        <tr>
                            <td>
                                <a href="{{ route('branches.show', $branch->id) }}">
                                {{ $branch->name }}
                            </td>
                            <td>
                                {{ $branch->address }}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type='text/javascript'>
        $(document).ready(function () {
            $('#branch').DataTable();
        });
    </script>
@endsection
