@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="pt-4"></div>
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif
    <h2 class="mt-4 mb-4">LeaveType</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span>
            </span>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#designationCreateModel">Create New LeaveType</button>
                            <!-- Modal -->
                <div class="modal fade" id="designationCreateModel" tabindex="-1" aria-labelledby="designationCreateModelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="designationCreateModelLabel">Create New LeaveType</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="create-designation" method="POST" action="{{route('leavetypes.store')}}" >
                                    <div class="modal-body">
                                        <div class="border p-3 rounded">
                                              <div class="col-12">
                                                <label class="form-label">LeaveType Name</label>
                                                <input type="text" class="form-control" name="name" required>
                                              </div>
                                              @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                              <div class="row">
                                                  <div class="col-md-6">
                                                  <label class="form-label">Days</label>
                                                  <input type="number" class="form-control" name="days" required>
                                                 @error('days')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                            </div>
                                               
                                                <div class="col-md-6">
                                                  <label for="designation" class="form-label">Status</label>
                                                  <select class="form-select" name="status" id="designation" required>
                                                      <option selected disabled="" value="">Choose...</option>
                                                      <option selected value="1">Active</option>
                                                      <option selected value="0">De-Active</option>
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
                                                        <textarea required class="form-control" name="description" id="note" maxlength="250" rows="3" placeholder="e.g. Note"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="alert alert-danger mt-2" id="description_error" style="display: none"></div>
                                                  
                                </div>
                                    </div>
                            <div class="modal-footer">
                                @csrf
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create LeaveType</button>
                            </div>
                        </form>
                    </div>
                </div>
                    </div>
                </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>LeaveType Name</th>
                        <th>Days</th>
                        <th>Description</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>LeaveType Name</th>
                        <th>Days</th>
                        <th>Description</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                    @endphp
                        
                    
                @foreach($leave_types as $leave_type)
                    @php
                        $serial++;
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td>{{ $leave_type->name }}</td>
                        <td>{{ $leave_type->days }}</td>
                        <td>{{ $leave_type->description }}</td>

                        <td style="text-align: right;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('leavetypes.edit',$leave_type->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            
                            <form action="{{ route('leavetypes.destroy', $leave_type->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" style="font-size:13px " role="button"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
            </table>
        </div>
</div>


@endsection