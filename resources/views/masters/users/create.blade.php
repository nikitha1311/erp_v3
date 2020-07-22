@extends('layouts.app1')
@section('head')

@endsection
@section('content')

    <div class="row twflex twjustify-center">
        <div class="col-8 offset-2 m-portlet m-portlet--mobile ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Create User
                            <small></small>
                        </h3>
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
            <form action="{{ url("users") }}" method="post">
                {{csrf_field()}}
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control m-input" id="name" name="name" placeholder="Name"
                               value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <span class="m-form__help twtext-red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group m-form__group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control m-input" id="email" name="email" placeholder="Email"
                               value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <span class="m-form__help twtext-red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group m-form__group">
                        <label for="phone">Phone</label>
                        <input type="number" min="0000000000" class="form-control m-input" id="phone" name="phone"
                               placeholder="Phone" value="{{ old('phone') }}">
                        @if($errors->has('phone'))
                            <span class="m-form__help twtext-red">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

{{--                    <div class="form-group m-form__group">--}}
{{--                        <label for="branch">Branch</label>--}}
{{--                        <select name="branch_id" id="branch" class="form-control">--}}
{{--                            @foreach(branches() as $branch)--}}
{{--                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        @if($errors->has('branch'))--}}
{{--                            <span class="m-form__help twtext-red">{{ $errors->first('branch') }}</span>--}}
{{--                        @endif--}}
{{--                    </div>--}}


                </div>

                <div class="m-portlet__foot">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-default">Clear</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
@section('scripts')

@endsection


