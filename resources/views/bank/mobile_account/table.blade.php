@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="pt-4"></div>
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif
    <h2 class="mt-4 mb-4">All Mobile Account</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span>
            </span>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bankAccountCreateModel">Create Mobile Account</button>
                            <!-- Modal -->
                <div class="modal fade" id="bankAccountCreateModel" tabindex="-1" aria-labelledby="bankAccountCreateModelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bankAccountCreateModelLabel">Create Mobile Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="create-bank" method="POST" action="{{route('mobile-account.store')}}" >
                                    <div class="modal-body">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="validationDefault02" class="form-label">Name</label>
                                        <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">AT</span>
                                            <input type="text" name="account_title" placeholder="Account Title" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="account_type" value="mobile">
                                    <div class="col-md-12">
                                        <label for="validationDefault01" class="form-label">Account No</label>
                                        <div class="input-group"> <span class="input-group-text" id="inputGroupPrepend2">AC</span>
                                            <input type="text" name="account_no" placeholder="Account No" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required="">
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
                        <th>Name</th>
                        <th>Number</th>
                        <th>Withdrawn</th>
                        <th>Deposit</th>
                        <th>Balance</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Withdrawn</th>
                        <th>Deposit</th>
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
                        <td>{{ $bankaccount->title }}</td>
                        <td>{{ $bankaccount->account_no }}</td>
                        <td>{{ $bankaccount->debit }}</td>
                        <td>{{ $bankaccount->credit }}</td>
                        <td>{{ $bankaccount->balance }}</td>

                        <td style="text-align: right;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('mobile-account.edit',$bankaccount->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            
                            <form action="{{ route('mobile-account.destroy', $bankaccount->id) }}" method="POST" style="display:inline">
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