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
                <form action="{{ route ('price-list-update',$PriceListEdit->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label class="form-label"><b>Name</b> </label>
                        <input type="text" class="form-control" name="name" value="{{$PriceListEdit->name}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Update price list</b> </label>
                        <input type="text" class="form-control" name="c_price" value="{{$PriceListEdit->c_price}}">
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