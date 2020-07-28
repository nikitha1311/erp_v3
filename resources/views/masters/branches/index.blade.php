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

                                <form id="branchDeleteForm{{$branch->id}}" action="{{route('branches.destroy', $branch->id )}}" method="post" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="float-right" href="#" onclick="$('#branchDeleteForm{{$branch->id}}').submit()">
                                    <i class="fa fa-trash ml-4 justify-content-between text-danger"
                                       aria-hidden="true"></i>
                                </a>
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
