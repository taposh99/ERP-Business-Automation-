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
      <h5 class="modal-title" id="bankCreateModelLabel">Update LeaveType</h5>
    </div>
    <div class="card-body">
      <div class="border p-3 rounded">
              <form id="create-bank" method="POST" action="{{route('leavetypes.update', $leave_type->id)}}" >
                <div class="col-12">
                  <label class="form-label">LeaveType Name</label>
                  <input type="text" class="form-control" name="name" value="{{old('name', $leave_type->name)}}" required>
                </div>
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-6">
                    <label class="form-label">Days</label>
                    <input type="number" class="form-control" name="days" value="{{old('days', $leave_type->days)}}" required>
                  </div>
                  @error('days')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                  <div class="col-md-6">
                    <label for="designation" class="form-label">Status</label>
                    <select class="form-select" name="status" id="designation" required>
                        <option disabled value="">Choose...</option>
                        @if( $leave_type->status == 'Active')
                          <option selected value="1">Active</option>
                          <option value="0">De-Active</option>
                        @else
                          <option value="1">Active</option>
                          <option selected value="0">De-Active</option>
                        @endif
                        
                    </select>
                    @error('status')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>
                

                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>LeaveType Description</label>
                          <textarea required class="form-control" name="description" id="note" maxlength="250" rows="3" placeholder="e.g. Note">{{old('description', $leave_type->description)}}</textarea>
                      </div>
                  </div>
              </div>
                <div class="alert alert-danger mt-2" id="description_error" style="display: none"></div>
                          
              <div class="modal-footer">
                  @csrf
                  @method('put')
                  <button type="submit" class="btn btn-primary">Update LeaveType</button>
              </div>
          </form>

  </div>
    </div>
    </div>
  </div>

@endsection