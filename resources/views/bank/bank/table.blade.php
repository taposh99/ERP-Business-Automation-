@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="pt-4"></div>
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif
    <h2 class="mt-4 mb-4">All Banks</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span>
            </span>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bankCreateModel">Create New Bank</button>
                            <!-- Modal -->
                <div class="modal fade" id="bankCreateModel" tabindex="-1" aria-labelledby="bankCreateModelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bankCreateModelLabel">Create New Bank</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="create-bank" method="POST" action="{{route('banks.store')}}" >
                                    <div class="modal-body">
                                      <div class="border p-3 rounded">
                                       
                                        <div class="col-12">
                                          <label class="form-label">Bank Name</label>
                                          <input type="text" class="form-control" name="bank_name" required>
                                        </div>
                                        <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                                        <div class="col-12">
                                            <label class="form-label">Bank Short Name</label>
                                            <input type="text" class="form-control" name="short_name" required>
                                          </div>
                                          <div class="alert alert-danger mt-2" id="short_name_error" style="display: none"></div>
                                        </div>
                                    </div>
                           

                            <div class="modal-footer">
                                @csrf
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create Bank</button>
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
                        <th>Bank Name</th>
                        <th>Bank Short Name</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Bank Name</th>
                        <th>Bank Short Name</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                    @endphp
                        
                    
                @foreach($banks as $bank)
                    @php
                        $serial++;
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td>{{ $bank->name }}</td>
                        <td>{{ $bank->short_name }}</td>

                        <td style="text-align: right;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('banks.edit',$bank->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            
                            <form action="{{ route('banks.destroy', $bank->id) }}" method="POST" style="display:inline">
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