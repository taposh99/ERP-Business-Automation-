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
      <h5 class="modal-title" id="bankCreateModelLabel">Create New Employee</h5>
    </div>
    <div class="card-body">
      <div class="border p-3 rounded">
              <form id="create-bank" method="POST" action="{{route('employee.update' , $employee->id)}}" enctype="multipart/form-data" >
                <div class="row mt-3">
                  <div class="col-md-6">
                    <label for="department" class="form-label">Department</label>
                    <select class="form-select" name="department_id" id="department" required="">
                        <option disabled="" value="">Choose...</option>
                        @foreach ($department as $department)
                            <option  value="{{$department ->id}}" @if ($employee->department_id == $department ->id)
                               selected 
                            @endif >{{$department ->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                  <label for="designation" class="form-label">Designation</label>
                  <select class="form-select" name="designation_id" id="designation" required="">
                      <option disabled  value="">Choose...</option>
                      @foreach ($designation as $designation)
                          <option value="{{$designation->id}}" @if ($employee->designation_id == $designation ->id)
                            selected 
                         @endif>{{$designation ->name}}</option>
                      @endforeach
                  </select>
              </div>
                  
                </div>
              <div class="row mt-3">
                  <div class="col-md-12">
                      <label for="validationDefault03" class="form-label">Name</label>
                      <div class="input-group"> <span class="input-group-text" id="bname">N</span>
                          <input type="text" name="name" value="{{old('name', $employee->name)}}" class="form-control" placeholder="Name" id="name" aria-describedby="bname" required>
                      </div>                                                        
                   </div>

              </div>
              <div class="row mt-3">
                  <div class="col-md-6">
                      <label for="validationDefault05" class="form-label">Father Name</label>
                      <div class="input-group"> <span class="input-group-text" id="fathername">FN</span>
                          <input type="text" name="father_name" value="{{old('father_name', $employee->father_name)}}" class="form-control" placeholder="Father Name" id="validationDefault05" required="">
                      </div>
                  </div> 
                  <div class="col-md-6">
                    <label for="validationDefault05" class="form-label">Mother Name</label>
                    <div class="input-group"> <span class="input-group-text" id="mothername">MN</span>
                        <input type="text" name="mother_name" value="{{old('mother_name', $employee->mother_name)}}" class="form-control" placeholder="Mother Name" id="validationDefault05" required="">
                    </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-6">
                    <label for="validationDefault05" class="form-label">Mobile</label>
                    <div class="input-group"> <span class="input-group-text" id="fathername">FN</span>
                        <input type="tel" name="mobile" value="{{old('mobile', $employee->mobile)}}" class="form-control" placeholder="Mobile" id="mobuile" required="">
                    </div>
                </div> 
                <div class="col-md-6">
                  <label for="validationDefault05" class="form-label">Phone</label>
                  <div class="input-group"> <span class="input-group-text" id="mothername">MN</span>
                      <input type="tel" name="phone"  value="{{old('phone', $employee->phone)}}" class="form-control" placeholder="Phone" id="phone">
                  </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <div class="input-group"> <span class="input-group-text" id="email">EM</span>
                      <input type="email" name="email"  value="{{old('email', $employee->email)}}" class="form-control" placeholder="Email" >
                  </div>
              </div> 
              <div class="col-md-6">
                <label for="nid" class="form-label">NID No</label>
                <div class="input-group"> <span class="input-group-text" id="nid">NI</span>
                    <input type="number" name="nid" value="{{old('nid', $employee->nid)}}" class="form-control" placeholder="54434224343" required="">
                </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6">
                <label for="dateofbirth" class="form-label">Date of Birth</label>
                <div class="input-group"> <span class="input-group-text" id="dateofbirth">DOB</span>
                    <input type="date" id="currentDate" name="dateofbirth" value="{{old('dateofbirth', $employee->dateofbirth)}}" class="form-control"  required="">
                </div>
                <label for="joindate" class="form-label">Joining Date</label>
              <div class="input-group"> <span class="input-group-text" id="joindate">JOB</span>
                  <input type="date" id="currentDate1" name="joindate" value="{{old('joindate', $employee->joindate)}}" class="form-control"  required="">
              </div>
              <label for="salary" class="form-label">Salary</label>
              <div class="input-group"> <span class="input-group-text" id="salary">SA</span>
                  <input type="number" name="salary" value="{{old('salary', $employee->salary)}}" class="form-control" placeholder="10000" required="">
              </div>
              <label for="status" class="form-label">Status</label>
                  <select class="form-select" name="status" id="status" required="">
                    @if($employee->status == '1')
                    <option value="1" selected>Active</option>
                    <option value="0">Deactive</option>
                    @else
                    <option value="1" >Active</option>
                    <option value="0" selected >Deactive</option>
                    @endif
                  </select>
                  <label for="branch" class="form-label">Gender</label>
                  <select class="form-select" name="gender" id="status" required="">
                    @if ($employee->gender == 'Male')
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                    @else
                    <option value="Male">Male</option>
                    <option value="Female" selected >Female</option>
                    @endif
                    
                </select>
                  
            </div> 
            
            <div class="col-md-6">
              <img src="{{asset('images/employee/'.$employee->profile_image)}}" style="max-width: 200px;">
                <input type="file" name="profile_image" class="form-control">
            </div>
            <label for="branch" class="form-label">Branch</label>
              <div class="input-group"> <span class="input-group-text" id="branch">BR</span>
                  <input type="text" name="branch" value="{{old('branch', $employee->branch)}}" class="form-control" placeholder="branch" required>
              </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-6">
            <div class="form-group">
                <label>Residensial Address</label>
                <textarea class="form-control" name="residensial_address" id="residensial-address" maxlength="250" rows="3" placeholder="Residensial Address" required>{{old('residensial_address', $employee->residensial_address)}}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label>Parmanent Address</label>
                <textarea class="form-control" name="parmanent_address" id="parmanent-address" maxlength="250" rows="3" placeholder="Residensial Address" required>{{old('parmanent_address', $employee->parmanent_address)}}</textarea>
            </div>
          </div>
        </div>        
          <div class="modal-footer">
            @method('put')
              @csrf
              <button type="submit" class="btn btn-primary">Create Employee</button>
          </div>
      </form>

  </div>
    </div>
    </div>
  <script>
    var date = new Date();
    var currentDate = date.toISOString().slice(0,10);
    var currentDate1 = date.toISOString().slice(0,10);
    document.getElementById('currentDate').value = currentDate;
    document.getElementById('currentDate1').value = currentDate1;
</script>
@endsection