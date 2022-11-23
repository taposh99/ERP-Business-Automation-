@extends('layouts.app')
@section('content')
<div class="mb-4 pb-4"></div>

@if(session('success'))
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif

<div class="d-flex justify-content-center">
<div class="card mt-4" style="width: 500px">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-2">
      Edit Bank
    </h5>
    
  </div>
    <div class="card-body">
      <div class="border p-3 rounded">
        <form method="POST" action="{{route('banks.update', $bank->id)}}">
        <div class="col-12">
          <label class="form-label">Bank Name</label>
          <input type="text" class="form-control" name="bank_name" value="{{old('bank_name', $bank->name)}}">
        </div>
        @error('bank_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
          <label class="form-label">Bank Short Name</label>
          <input type="text" class="form-control" name="short_name" value="{{old('short_name', $bank->short_name)}}">
        </div>
        @error('short_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
 
          
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