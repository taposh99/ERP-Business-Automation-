@extends('layouts.app')
@section('content')
<div class="row mb-4 mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Create New User
                </h3>
            </div>
        </div>
    </div>
</div>
@if(session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}
</div>
@endif
<div class="d-flex justify-content-center mt-4">
<div class="card" style="width: 500px">
    <div class="card-header d-flex justify-content-center">

    Add User

    </div>
    <div class="card-body">
      <div class="border p-3 rounded">
        <form method="POST" action="{{route('users.store')}}">
        <div class="col-12">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
          <label class="form-label">Email Address</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          <div class="col-12 mb-4">
            <label class="form-label">Conform Password</label>
            <input type="password" class="form-control" name="password_confirmation" required>
          </div>
          @error('conform_password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          
          
        <div class="col-12">
          <div class="d-grid">
            @csrf
            <button type="submit" class="btn btn-primary">Create New User</button>
          </div>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
@endsection