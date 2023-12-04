@extends('layouts.app')
@section('content')
<div class="pt-4"></div>
@if(session('success'))
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif

<div class="d-flex justify-content-center mt-4">
<div class="card" style="width: 500px">
    <div class="card-header d-flex justify-content-center bg-primary text-white">
      <h5 class="modal-title" id="bankCreateModelLabel">New Department</h5>
    </div>
    <div class="card-body">
      <div class="border p-3 rounded">
              <form id="create-bank" method="POST" action="{{route('department.store')}}" >
                <div class="col-12">
                  <label class="form-label">Department Name</label>
                  <input type="text" class="form-control" name="name" required>
                </div>
                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Department Description</label>
                          <textarea required class="form-control" name="description" id="note" maxlength="250" rows="3" placeholder="e.g. Note"></textarea>
                      </div>
                  </div>
              </div>
                <div class="alert alert-danger mt-2" id="description_error" style="display: none"></div>
                          
              <div class="modal-footer">
                  @csrf
                  <button type="submit" class="btn btn-primary">Create new Department</button>
              </div>
          </form>

  </div>
    </div>
    </div>
  </div>

@endsection