@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Warranty Claim Details</h2>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">Add New Warranty Claim</button>
        <!-- Modal -->
        <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <form action="{{route('warranty-show-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">

                                <div class="col-12">
                                    <label class="form-label"><b>Name</b></label>
                                    <input type="text" class="form-control" name="name" placeholder="e.g  Bashundhara" required>
                                </div>

                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-12">
                                    <label class="form-label"><b>Contact</b></label>
                                    <input type="text" class="form-control" name="contact" placeholder="e.g 01934000000" required>
                                </div>

                                @error('contact')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-12">
                                    <label class="form-label"><b>Product</b></label>
                                    <input type="text" class="form-control" name="product" placeholder="e.g HP i5" required>
                                </div>

                                @error('product')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label"><b>Sales Date</b></label>
                                    <input type="date" class="form-control" name="s_date" placeholder="e.g 10/11/2022" required>
                                </div>

                                @error('s_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-12">
                                    <label class="form-label"><b>Warranty Expired</b></label>
                                    <input type="date" class="form-control" name="w_date" placeholder="e.g 10/11/2024" required>
                                </div>

                                @error('w_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


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
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Product</th>
                    <th>Sales Date</th>
                    <th>Warranty Expired</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                @php $i=1 @endphp
                @foreach($warrantyStore as $warrantyStores)
                <tr>
                    <td>{{ $i++ }} </td>
                    <td>{{ $warrantyStores->name }} </td>
                    <td>{{ $warrantyStores->contact }} </td>
                    <td>{{ $warrantyStores->product }} </td>
                    <td>{{ $warrantyStores->s_date }} </td>
                    <td>{{ $warrantyStores->w_date }} </td>




                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('warranty-show-edit',['id'=>$warrantyStores->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('warranty-show-delete')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="warranty_delete" value="{{$warrantyStores->id}}">
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
