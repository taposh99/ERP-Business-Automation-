@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="pt-4"></div>
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif
    <h2 class="mt-4 mb-4">All Bank Account</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span>
            </span>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bankAccountCreateModel">Create New Bank Account</button>
                            <!-- Modal -->
                <div class="modal fade" id="bankAccountCreateModel" tabindex="-1" aria-labelledby="bankAccountCreateModelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bankAccountCreateModelLabel">Create New Bank Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="create-bank" method="POST" action="{{route('bank-account.store')}}" >
                                    <div class="modal-body">
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <label for="validationDefault01" class="form-label">Account No</label>
                                                            <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">AC</span>
                                                                <input type="text" name="account_no" placeholder="Account No" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                                                            </div>                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationDefault02" class="form-label">Account Title</label>
                                                            <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">AT</span>
                                                                <input type="text" name="account_title" placeholder="Account Title" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                                                            </div>                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <label for="validationDefault04" class="form-label">Select Bank</label>
                                                            <select class="form-select" name="selected_bank" id="validationDefault04" required="">
                                                                <option selected="" disabled="" value="">Choose...</option>
                                                                @foreach ($banks as $bank)
                                                                    <option  value="{{$bank->id}}">{{$bank->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationDefault03" class="form-label">Branch Name</label>
                                                            <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">BN</span>
                                                                <input type="text" name="branch_name" class="form-control" placeholder="Branch Name" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                                                            </div>                                                        
                                                        </div>

                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <label for="validationDefault05" class="form-label">Branch Code</label>
                                                            <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">BC</span>
                                                                <input type="text" name="branch_code" class="form-control" placeholder="Branch Code" id="validationDefault05" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationDefaultUsername" class="form-label">Branch Location</label>
                                                            <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">BL</span>
                                                                <input type="text" name="branch_location" placeholder="Branch Location" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="col-12 mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"  value="" id="invalidCheck2" required="">
                                                                <label class="form-check-label" for="invalidCheck2">I checked field Carefully.</label>
                                                            </div>
                                                        </div>
                                                       
                                                    
                                                </div>
                                           
                           

                            <div class="modal-footer">
                                @csrf
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create Account</button>
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
                        <th>Bank</th>
                        <th>A/C No</th>
                        <th>Title</th>
                        <th>Branch</th>
                        <th>Location</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Bank</th>
                        <th>A/C No</th>
                        <th>Title</th>
                        <th>Branch</th>
                        <th>Location</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                        
                    @endphp
                        
                    
                @foreach($bankaccounts as $bankaccount)
                    @php
                        $serial++; 
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td>{{ $bankaccount->bank->short_name }}</td>
                        <td>{{ $bankaccount->account_no }}</td>
                        <td>{{ $bankaccount->title }}</td>
                        <td>{{ $bankaccount->branch."- ".$bankaccount->branch_code }}</td>
                        <td>{{ $bankaccount->location }}</td>
                        <td>{{ $bankaccount->debit }}</td>
                        <td>{{ $bankaccount->credit }}</td>
                        <td>{{ $bankaccount->balance }}</td>

                        <td style="text-align: right;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('bank-account.edit',$bankaccount->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            
                            <form action="{{ route('bank-account.destroy', $bankaccount->id) }}" method="POST" style="display:inline">
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