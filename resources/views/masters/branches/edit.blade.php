@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-header">
            <h5>
                Branch
                <small></small>
            </h5>
            <div>
                <ul>
                    <li>
                        <a href="{{ url("branches") }}">
                            <button class="btn btn-primary">
                                <i class="fa fa-arrow-left"></i>
                                <span>Back</span>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <form action="{{ route('branches.update',$branch->id) }}" method='POST'>
            <div class='panel-body'>
                @csrf
                @method('PATCH')
                @include('masters.branches.partials._form',[
               'branch' => $branch,
                'disabled' => false,
                ])
            </div>
            <div class="panel-footer">
                @include('components._formButtons', ['primaryText' => 'Update'])
            </div>
        </form>
    </div>
@endsection
