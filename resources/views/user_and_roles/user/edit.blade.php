@extends('layouts.app')
@section('content')
<div class="mb-4"></div>

@if(session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}

</div>
@endif
<div class="d-flex justify-content-center">
<div class="card" style="width: 500px">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-2">
      Edit User
    </h5>
    
  </div>
    <div class="card-body">
      <div class="border p-3 rounded">
        <form method="POST" action="{{route('users.update', $user->id)}}">
        <div class="col-12">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
          <label class="form-label">Email Address</label>
          <input type="email" class="form-control" name="email" value="{{old('email', $user->email)}}">
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
          <label class="form-label">Phone</label>
          <input type="text" class="form-control" name="phone_number" value="{{old('phone_number', $user->phone_number)}}">
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="{{old('password')}}">
          </div>
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          <div class="col-12 mb-4">
            <label class="form-label">Conform Password</label>
            <input type="password" class="form-control" name="password_confirmation" {{old('password')}}>
          </div>
          @error('conform_password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          
        <div class="create-user-with-role">
          <h6>Roles</h6>
              <div class="grid grid-cols-3 gap-4">
              @foreach($roles as $role)

              <div class="form-check form-switch mb-3">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault{{$role->id}}" name="roles[] "value="{{$role->id}}" @if (count($user->roles->where('id',$role->id)))
                      checked
                  @endif>
                  <label class="form-check-label" for="flexSwitchCheckDefault{{$role->id}}">{{ $role->name }}</label>
              </div>
              @endforeach
              </div>
        </div>
        <div class="col-12">
          <div class="d-grid">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
@endsection