@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-header">
                    <h5>
                        Customer Contract List
                    </h5>
                    <div class="header-action">
                        <a type='button' href="{{ route('contracts.create')}}" class="btn btn-primary">
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
                                <th>Id</th>
                                <th>Description</th>
                                <th>Signed on</th>
                                <th>Valid till</th>
                                <th>Created by</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $contract)
                                    <tr>
                                        <td>
                                            <a href="{{ route('contracts.show', $contract->id) }}">
                                                {{$contract->id}}
                                            </a>
                                        </td>
                                        <td>{{$contract->description }}</td>
                                        <td>{{$contract->signed_at}}</td>
                                        <td>
                                            {{$contract->valid_till}}
                                        </td>
                                        <td>
                                            {{$contract->created_by}}
                                        </td>
                                        <td>
                                            {{$contract->status}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    footer
                </div>
            </div>
        </div>
    </div>
@endsection