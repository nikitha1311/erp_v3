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
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Address</th>
                            <th scope="col">Consignor</th>
                            <th scope="col">Consignee</th>
                            <th scope="col">Billed On</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->code}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>
                                        <a  href="{{ route('customers.show',$customer->id) }}"  class='btn btn-primary btn-sm'>
                                            <i class='fa fa-eye'></i>
                                        </a>
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