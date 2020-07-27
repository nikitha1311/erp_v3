@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="panel panel-default">
            <div class="panel-header">
                <h5>Customers List</h5>

                <div class="header-action">
                    <a type='button' href="{{ route('customers.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="customers_table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Address</th>
                            <th>Consignor</th>
                            <th>Consignee</th>
                            <th>Billed On</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        <a href="{{ route('customers.show', $customer->id) }}">
                                            {{$customer->name}}
                                        </a>
                                    </td>
                                    <td>{{$customer->code}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>
                                        @if($customer->is_consignor)
                                        <i class="fa fa-check"></i>
                                        @else
                                        <i class="fa fa-times"></i>
                                        @endif
                                        {{-- {{ $customer->is_consignor }} --}}
                                    </td>
                                    <td>
                                        @if($customer->is_consignee)
                                        <i class="fa fa-check"></i>
                                        @else
                                        <i class="fa fa-times"></i>
                                        @endif
                                        {{-- {{ $customer->is_consignee }} --}}
                                    </td>
                                    <td>
                                        @if($customer->is_billed_on)
                                        <i class="fa fa-check"></i>
                                        @else
                                        <i class="fa fa-times"></i>
                                        @endif
                                        {{-- {{ $customer->is_billed_on }} --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type='text/javascript'>
    $(document).ready( function () {
        alert();
        $("#customers_table").DataTable();
    });
</script>
@endsection