@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Service Center</h2>
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



                    <form action="{{route('service-center-store')}}" method="post" enctype="multipart/form-data">
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

                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-12">
                                    <label class="form-label"><b>Address</b></label>
                                    <input type="text" class="form-control" name="address" placeholder="e.g Panthapath, Dhaka 1215" required>
                                </div>

                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-12">
                                    <label class="form-label"><b>Description</b></label>
                                    <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>

                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="save">
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
                    <th>Address</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                @php $i=1 @endphp
                @foreach($servicecenter as $servicecenters)
                <tr>
                    <td>{{ $i++ }} </td>
                    <td>{{ $servicecenters->name }} </td>
                    <td>{{ $servicecenters->contact }} </td>
                    <td>{{ $servicecenters->address }} </td>
                    <td>{{ $servicecenters->description }} </td>



                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('service-center-edit',['id'=>$servicecenters->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('service-center-delete')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="service_delete_id" value="{{$servicecenters->id}}">
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