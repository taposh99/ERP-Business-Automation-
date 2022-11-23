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
      <h5 class="modal-title" id="bankCreateModelLabel">Edit Leave Request</h5>
    </div>
    <div class="card-body">
      <div class="border p-3 rounded">
              <form id="create-bank" method="POST" action="{{route('leave-application.update', $leave_application->id)}}" enctype="multipart/form-data" >
                @method('put')
                <div class="row mt-3">
                  <div class="col-md-6">
                    <label for="department" class="form-label">Employee</label>
                    <select class="form-select" name="employee_id" id="department" required="">
                        <option selected="" disabled="" value="">Choose...</option>
                        @foreach ($employees as $employee)
                            <option  value="{{$employee ->id}}" @if ($leave_application->employee_id === $employee ->id)
                                selected
                            @endif>{{$employee ->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                  <label for="designation" class="form-label">Leave Types</label>
                  <select class="form-select" name="leave_types_id" id="designation" required>
                      <option selected disabled value>Choose...</option>
                      @foreach ($leave_types as $leave_type)
                          <option value="{{$leave_type->id}}" @if ($leave_application->employee_id === $employee ->id)
                            selected
                        @endif>{{$leave_type ->name}}</option>
                      @endforeach
                  </select>
              </div>
                  
                </div>
              <div class="row mt-3">
                  <div class="col-md-6">
                      <label for="validationDefault03" class="form-label">Apply Date</label>
                      <div class="input-group"> 
                        <input type="date" id="currentDate2" name="apply_date" value="{{old('apply_date',$leave_application->apply_date)}}" class="form-control"  required>
                      </div>                                                        
                   </div>
                <div class="col-md-6">
                  <label for="dateofbirth" class="form-label">Leave Form</label>
                  <div class="input-group"> 
                      <input type="date" id="currentDate" name="leave_form" value="{{old('leave_form',$leave_application->leave_form)}}" class="form-control"  required>
                  </div>
                </div> 
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label for="status" class="form-label">Status</label>
                      <select class="form-select" name="status" id="status" required>
                          @if ($leave_application->status == 0)
                              <option value="1">Active</option>
                              <option value="0" selected>De-Active</option>
                          @else
                              <option value="1" selected>Active</option>
                              <option value="0">De-Active</option>
                          @endif
                        
                      </select>
                </div>
                <div class="col-md-6">
                <label for="joindate" class="form-label">Leave To</label>
                <div class="input-group"> 
                    <input type="date" id="currentDate1" name="leave_to" value="{{old('leave_to',$leave_application->leave_to)}}" class="form-control"  required>
              </div>
                </div>

              </div>
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>Reason</label>
                        <textarea class="form-control" name="reason" id="residensial-address" maxlength="250" rows="3" placeholder="Residensial Address" required>{{old('reason',$leave_application->reason)}}</textarea>
                    </div>
                  </div>
                  

          <div class="col-md-6">
            <div class="form-group">
                <label>Note</label>
                <textarea class="form-control" name="note" id="parmanent-address" maxlength="250" rows="3" placeholder="Residensial Address" required>{{old('note',$leave_application->note)}}</textarea>
            </div>
          </div>
        </div>        
          <div class="modal-footer">
              @csrf
              <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>

  </div>
    </div>
    </div>
  <script>
    var date = new Date();
    var currentDate = date.toISOString().slice(0,10);
    var currentDate1 = date.toISOString().slice(0,10);
    var currentDate2 = date.toISOString().slice(0,10);
    document.getElementById('currentDate').value = currentDate;
    document.getElementById('currentDate1').value = currentDate1;
    document.getElementById('currentDate2').value = currentDate2;
</script>
@endsection