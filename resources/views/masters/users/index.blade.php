@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                User List
                <small></small>
            </h5>
            <div>
                <ul>
                    <li>
                        <a href="{{ url("users/create") }}">
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
                <table class="table table-bordered" id="users_table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Branch</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user )
                        <tr>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td>
                                {{ $user->branch->name }}
                            </td>
                            <td>
                                <form id="userDeleteForm{{$user->id}}" action="{{route('users.destroy', $user->id )}}" method="post" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a  href="#" onclick="$('#userDeleteForm{{$user->id}}').submit()">
                                    <i class="fa fa-trash justify-content-between text-danger"
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
<script type="text/javascript">
    $(document).ready( function () {
        $('#users_table').DataTable();
    });
</script>
@endsection