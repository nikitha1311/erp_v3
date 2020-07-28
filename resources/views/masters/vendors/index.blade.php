@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Vendor List
                <small></small>
            </h5>
            <div>
                <ul>
                    <li>
                        <a href="{{ url("vendors/create") }}">
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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Outstanding</th>
                        <th>Address</th>
                        <th>Remarks</th>
                        <th>Created By</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vendors as $vendor )
                        <tr>
                            <td>
                                <a href="{{ route('vendors.show', $vendor->id) }}">
                                    {{ $vendor->name }}
                                </a>
                            </td>
                            <td>
                                {{ $vendor->phone }}
                            </td>
                            <td>
                                {{ $vendor->company_name }}
                            </td>
                            <td>
                                {{ $vendor->current_outstanding }}
                            </td>
                            <td>
                                {{ $vendor->address }}
                            </td>
                            <td>
                                {{ $vendor->remarks }}
                            </td>
                            <td>
                                {{ $vendor->createdBy->name }}
                            </td>
                            <td>
                                <form id="vendorDeleteForm{{$vendor->id}}" action="{{route('vendors.destroy', $vendor->id )}}" method="post" hidden>
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a  href="#" onclick="$('#vendorDeleteForm{{$vendor->id}}').submit()">
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
