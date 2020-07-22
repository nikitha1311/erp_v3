@extends('layouts.app1')

@section('content')
    <div class='container py-4'>
        <div class='card'>
            <div class='card-header'>
                Edit Can Details
            </div>

            <div class='card-body'>
                <form action="{{ route('users.update',$user->id) }}" method='POST'>
                    @csrf
                    {{method_field('PATCH')}}
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

                        <a type="button" class="btn btn-primary" href="{{ route('users.index') }}">
                            Back
                        </a>

                        <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

        </div>
    </div>
@endsection
