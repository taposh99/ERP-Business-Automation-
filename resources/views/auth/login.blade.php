@extends('layouts.app')
@section('content')

<div class="card" style="width:500px; position: absolute; top: 50%; left:50%; transform:translate(-50%, -50%)">
    <div class="card-header">
        <h5 class="text-center">AXES Business Automation</h5>
    </div>
    <div class="card-body">
      @if ($errors->any())
          <ul style="list-style: none; padding:0; margin: 0">
              @foreach ($errors->all() as $error)
                  <li class="alert alert-danger mb-3" role="alert">{{ $error }}</li>
              @endforeach
          </ul>
      @endif
      <div class="border p-3 rounded">
      <h6 class="mb-0 text-uppercase">Login form</h6>
       <hr>
      <form class="row g-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="col-12">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{old('email')}}" required>
        </div>
        <div class="col-12">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" value="{{old('password')}}" required>
        </div>
        <div class="col-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck2" name="remember">
            <label class="form-check-label" for="gridCheck2">
              Remember Me
            </label>
          </div>
        </div>

        <div class="col-12 mt-4">
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </div>
            <div class="mt-4"></div>

      </form>
    </div>
    </div>
  </div>
  @endsection
