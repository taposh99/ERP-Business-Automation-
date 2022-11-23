@extends('layouts.app')
@section('content')
<div class="mb-4"></div>
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Update Service Received
                </h3>
                <!-- message -->
                @if(session()->has('message'))
                <p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
                @elseif(session()->has('error'))
                <p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="card" style="width: 500px">
        <div class="card-body">
            <div class="border p-3 rounded">
                <form action="{{ route ('service-center-update',$serviceCenterEdit->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label class="form-label"><b>Name</b> </label>
                        <input type="text" class="form-control" name="name" value="{{$serviceCenterEdit->name}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Contact</b> </label>
                        <input type="text" class="form-control" name="contact" value="{{$serviceCenterEdit->contact}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Address</b> </label>
                        <input type="text" class="form-control" name="address" value="{{$serviceCenterEdit->address}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Description</b> </label>
                        <input type="text" class="form-control" name="description" value="{{$serviceCenterEdit->description}}">
                    </div>




                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection