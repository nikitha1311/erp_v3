@extends('layouts.app1')

{{-- @section('head')
    <style>
        .pac-container {
            z-index: 10000 !important;
        }
    </style>
@append --}}

@section('content')
    <section class="pt-60 pb-60">
        <div class="container pt-60 pb-60">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            User Profile
                            <div class="float-right">
                                <a href="{{ route('users.index') }}" class="btn btn-blue">
                                    <i class="fa fa-arrow-left mr-2"></i>
                                    <span>Back</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input required type="text" class="form-control" id="name" name="name"
                                           placeholder="Name"
                                           value="{{ old('name', $user->name) }}">
                                    @if($errors->has('name'))
                                        <span class="help-text text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input required type="text" class="form-control" id="email" name="email"
                                           placeholder="Email"
                                           value="{{ old('email', $user->email) }}">
                                    @if($errors->has('email'))
                                        <span class="help-text text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input required type="text" class="form-control" id="phone" name="phone"
                                           placeholder="Phone Number"
                                           value="{{ old('phone', $user->phone) }}">
                                    @if($errors->has('phone'))
                                        <span class="help-text text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label for="phone">Plan</label>--}}
{{--                                    <select name="plan_id" id="plan" class="form-control">--}}
{{--                                        @foreach($plans as $plan)--}}
{{--                                            <option value="{{$plan->id}}" @if($user->plan_id == $plan->id) selected @endif>{{$plan->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}

{{--                                    @if($errors->has('plan_id'))--}}
{{--                                        <span class="help-text text-danger">{{ $errors->first('plan_id') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}


                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-blue">Save</button>
                                    <button type="reset" class="btn btn-default">Clear</button>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


