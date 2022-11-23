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
          <h5 class="modal-title" id="mobileCreateModelLabel">Update Mobile Account</h5>
        </div>
        <div class="card-body">
          <div class="border p-3 rounded">
            <form id="create-bank" method="POST" action="{{route('mobile-account.update',$bankaccount->id)}}" >
                <div class="col-md-12">
                    <label for="validationDefault02" class="form-label">Name</label>
                    <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">AT</span>
                        <input type="text" name="account_title" value="{{old('account_title',$bankaccount->title)}}" placeholder="Eg- Bikash, Nogod" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                    </div>
                </div>
                <input type="hidden" name="account_type" value="mobile">
                <div class="col-md-12">
                    <label for="validationDefault01" class="form-label">Account No</label>
                    <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">AC</span>
                        <input type="text" name="account_no" value="{{old('account_no',$bankaccount->account_no)}}" placeholder="Account No" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                    </div>  
                </div>                                                      

                <div class="col-12 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invalidCheck2" required="">
                        <label class="form-check-label" for="invalidCheck2">I input the field Carefully.</label>
                    </div>
                </div>
            <div class="modal-footer">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-primary">Update Account</button>
            </div>
            </form>
        </div>
    </div>
      </div>
        </div>
    
    
@endsection