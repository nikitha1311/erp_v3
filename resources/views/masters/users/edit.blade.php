@extends('layouts.app')

@section('content')
    <div class='container py-4'>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <div class='panel panel-default'>
                    <div class='panel-header'>
                        Edit Can Details
                    </div>

                    <div class='panel-body'>
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
                            <div class="form-group m-form__group">
                                <label for="branch">Branch</label>
                                <select name="branch_id" id="branch" class="form-control">
                                    @foreach($branch as $branches)
                                        <option value="{{ $branches->id }}">{{ $branches->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('branch'))
                                    <span class="m-form__help text-danger">{{ $errors->first('branch') }}</span>
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
        </div>
    </div>
@endsection
