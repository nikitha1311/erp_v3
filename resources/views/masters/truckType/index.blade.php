@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        Rules For TruckType
                    </h5>
                </div>
                <div class="panel-body">
                    <div>
                        <ul>
                            <li>Use full forms like - container, taurus, FTL</li>
                            <li>Follow the format <strong>< FT > < TYPE > < BODY > </strong></li>
                            <li><strong>Eg. </strong>20FT CONTAINER</li>
                            <li><strong>Eg. </strong>32FT SXL CONTAINER</li>
                            <li><strong>Eg. </strong>40FT XXL CONTAINER</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        Add TruckType
                        <small></small>
                    </h5>
                    <div>
                        <ul>
                            <li>
                                <a href="{{ url("truck-types") }}">
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <form action="{{ url("truck-types") }}" method="post">
                    <div class="panel-body">
                        @csrf
                        <div class="form-group m-form__group">
                            <label for="name">Name</label>
                            <input required type="text" class="form-control m-input" id="name" name="name" autocomplete="off"
                                   placeholder="Name">
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="panel-footer">
                        @include('components._formButtons', ['primaryText' => 'Create'])
                    </div>
                </form>
            </div>

        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        TruckTypes List
                        <span class="badge badge-danger count-badge">
                                    {{ $trucks->count()}}
                                </span>
                        <small></small>
                    </h5>
                    <div>
                        <ul>
                            <li>
                                <a href="{{ url("truck-types/create") }}">

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id='truck_type_table'>
                            <thead>
                                <tr>
                                    <th>Trucks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($trucks as $truck )
                                        <tr>
{{--                                            <td class="d-flex justify-content-between">--}}

                                            <td>
                                                <div>
                                                    {{ $truck->name }}

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-between">
                                                    <a class="fa fa-edit btn btn-primary "
                                                        href="{{route('truck-types.edit',$truck->id)}}">
                                                    </a>
                                                    <form action="{{route('truck-types.destroy', $truck->id )}}" method="post" class="delete_form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="fa fa-trash btn btn-danger delete_btn"></button>
                                                    </form>
                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#truck_type_table').DataTable();
    });
</script>
@endsection
