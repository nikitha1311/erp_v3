@extends('layouts.app1')
{{-- @section('head')
         

@endsection --}}
@section('content')
    <div class="m-portlet m-portlet--mobile ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        User List
                        <small></small>
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ url("users/create") }}" class="m-portlet__nav-link m-portlet__nav-link--icon">
                            <button class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                <span>Add</span>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="table-responsive">

                <table class="table table-bordered twtext-base twleading-none" id="users-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Branch</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user )
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
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

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
{{-- @section('scripts')
    @parent
    <script>
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/users') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'branch.name', name: 'branch.name'},
                {data: 'roles', name: 'roles'},
                {data: 'permissions', name: 'permissions'},
            ],
            initComplete: function () {
                console.log("Done");
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement('input');
                    input.className = "form-control tww-auto";
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column.search(val ? val : '', true, false).draw();
                        });
                });
            },
            dom: 'Bftrip',
            buttons: [
                'excel', 'csv', 'copy'
            ],

        });
    </script>
@endsection --}}


