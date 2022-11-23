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
      <h5 class="modal-title" id="bankCreateModelLabel">Create Cheque</h5>
    </div>
    <div class="card-body">
      <div class="border p-3 rounded">
        <form id="create-bank" method="POST" action="{{route('manage-cheque.store')}}" >
          <div class="modal-body">
                          <div class="row mt-3">
                              <div class="col-md-6">
                                  <label for="validationDefault01" class="form-label">Date</label>
                                  <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">DT</span>
                                    <input class="form-control"   id="currentDate2"  type="date" name="date">
                                  </div>                                                        </div>
                              <div class="col-md-6">
                                  <label for="validationDefault02" class="form-label">Invoice Number</label>
                                  <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">IN</span>
                                      <input type="text" name="tran_no" placeholder="Invoice Number" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                                  </div>                                                        </div>
                              
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Cheque Number</label>
                                <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">CN</span>
                                    <input type="text" name="cheque_no" placeholder="Cheque No" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                                </div>                                                        </div>
                            <div class="col-md-6">
                                <label for="validationDefault02" class="form-label">Cheque Date</label>
                                <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">CD</span>
                                    <input class="form-control"   id="currentDate"  type="date" name="cq_date" required>
                                </div>                                                        </div>
                            
                        </div>
                          <div class="row mt-3">
                              <div class="col-md-6">
                                  <label for="validationDefault04" class="form-label">Chque Type</label>
                                  <select class="form-select" name="type" id="validationDefault04" required="">
                                      <option selected="" disabled="" value="">Choose...</option>
                                      <option value="received">Received</option>
                                      <option value="given">Given</option>
                                      <option value="deposit">Deposit</option>
                                      <option value="payment">Payment</option>
                                      <option value="return">Return</option>
                                      
                                  </select>
                              </div>
                              <div class="col-md-6">
                                  <label for="validationDefault03" class="form-label">Amount</label>
                                  <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">AM</span>
                                      <input type="text" name="amount" class="form-control" placeholder="Branch Name" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                                  </div>                                                        </div>

                          </div>
                          <div class="row mt-3">
                              <div class="col-md-6">
                                  <label for="validationDefault05" class="form-label">A/C No</label>
                                  <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">AN</span>
                                      <input type="text" name="ac_number" class="form-control" placeholder="Branch Code" id="validationDefault05" required="">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <label for="validationDefaultUsername" class="form-label">Status</label>
                                  <select class="form-select" name="status" id="validationDefault04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                              </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cheque Bank</label>
                                    <input type="text" name="cheque_bank" class="form-control" placeholder="Branch Code" id="validationDefault05" required="">
                                </div>
                            </div>
                        </div>
                          <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" name="note" id="note" maxlength="250" rows="3" placeholder="e.g. Note"></textarea>
                                </div>
                            </div>
                        </div>
                             
                          
                      </div>
                 
 

  <div class="modal-footer">
      @csrf
      <button type="submit" class="btn btn-primary">Create Cheque</button>
  </div>
</form>

  </div>
    </div>
    </div>
  </div>

@endsection