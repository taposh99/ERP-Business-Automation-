@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Claim Supplier</h2>
<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">New Create</button>
        <!-- Modal -->
        <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{route('claim-supplier-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">

                                <div class="col-12">
                                    <label class="form-label"><b>Images</b></label>
                                    <input type="file" class="form-control" name="image" placeholder="e.g  image">
                                </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label"><b>Products</b></label>
                                    <input type="text" class="form-control" name="product" placeholder="e.g  Hp core-i5" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Code</b></label>
                                    <input type="text" class="form-control" name="code" placeholder="e.g  hp-12012" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Serial</b></label>
                                    <input type="text" class="form-control" name="serial" placeholder="e.g 520" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Note</b></label>
                                    <input type="text" class="form-control" name="note" placeholder="e.g 520">
                                </div>



                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="save" required>
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
                    <th>Image</th>
                    <th>Product</th>
                    <th>Code</th>
                    <th>Serial</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @php $i=1; @endphp
                @foreach($claimsupplier as $claimsuppliers)

                <tr>
                    <td>{{$i++}}</td>
                    <td> <img src="{{ asset( '/claim-supplier/'.$claimsuppliers->image) }}" style="height: 50px;width: 50px" alt=""> </td>
                    <td>{{$claimsuppliers->product}} </td>
                    <td>{{$claimsuppliers->code}} </td>
                    <td>{{$claimsuppliers->serial}} </td>
                    <td>{{$claimsuppliers->note}} </td>

                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('claim-supplier-edit',['id'=>$claimsuppliers->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('claim-supplier-delete')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="claim_supplier_delete" value="{{$claimsuppliers->id}}">
                                <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>



    @endsection
