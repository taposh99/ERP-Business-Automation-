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
      Edit Department
    </h5>
    
  </div>
    <div class="card-body">
      <div class="border p-3 rounded">
        <form method="POST" action="{{route('department.update', $department->id)}}">
        <div class="col-12">
          <label class="form-label">Department Name list</label>
          <input type="text" class="form-control" name="name" value="{{old('name', $department->name)}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          <div class="col-md-12 mt-2 mb-2">
              <div class="form-group">
                  <label>Department Description</label>
                  <textarea class="form-control" name="description" id="note" maxlength="250" rows="3" placeholder="Description">{{old('description', $department->description)}}</textarea>
              </div>
          </div>
      
        @error('description')
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