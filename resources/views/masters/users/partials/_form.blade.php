<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control m-input" id="name" name="name" placeholder="Name"
           value="{{ old('name', $user->name) }}" required @if($disabled) disabled @endif>
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control m-input" id="email" name="email" placeholder="Email"
           value="{{ old('email', $user->email) }}" required @if($disabled) disabled @endif>
    @if($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" min="0000000000" class="form-control" id="phone" name="phone"
           placeholder="Phone" value="{{ old('phone', $user->phone) }}" @if($disabled) disabled @endif>
    @if($errors->has('phone'))
        <span class="text-danger">{{ $errors->first('phone') }}</span>
    @endif
</div>

<div class="form-group">
    <label for="branch">Branch</label>
    <select name="branch_id" id="branch" class="form-control" @if($disabled) disabled @endif>
        @foreach($branches as $branch)
            <option @if($user->branch_id == $branch->id) selected
                    @endif value="{{ $branch->id }}">{{ $branch->name }}</option>
        @endforeach
    </select>
    @if($errors->has('branch'))
        <span class="text-danger">{{ $errors->first('branch') }}</span>
    @endif
</div>
