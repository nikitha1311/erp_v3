@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-8  m-portlet m-portlet--mobile panel panel-default px-0">
                <div class="m-portlet__head panel-header">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h5 class="m-portlet__head-text">
                                Create User
                                <small></small>
                            </h5>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ url("users") }}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-arrow-left"></i>
                                        <span>Back</span>
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ url("users") }}" method="post">
                        {{csrf_field()}}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control m-input" id="name" name="name" placeholder="Name"
                                       value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <span class="m-form__help text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group m-form__group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control m-input" id="email" name="email" placeholder="Email"
                                       value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <span class="m-form__help text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" min="0000000000" class="form-control" id="phone" name="phone"
                                       placeholder="Phone" value="{{ old('phone') }}">
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                             <div class="form-group m-form__group">
                                <label for="branch">Branch</label>
                                <select name="branch_id" id="branch" class="form-control">
                                    @foreach($branch as $branches)
                                        <option value="{{ $branches->id }}">{{ $branches->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('branch'))
                                    <span class="m-form__help twtext-red">{{ $errors->first('branch') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="m-portlet__foot">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection


