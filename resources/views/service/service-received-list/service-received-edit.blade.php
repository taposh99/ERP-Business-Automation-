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
                <form action="{{ route ('service-received-update',$servicestore->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label class="form-label"><b>Customer NAME</b> </label>
                        <input type="text" class="form-control" name="cname" value="{{$servicestore->cname}}" placeholder="Customer_Name">
                    </div>

                    <br>
                    <div class="col-12">
                        <label class="form-label"><b>Phone </b></label>
                        <input type="text" class="form-control" name="cphone" value="{{$servicestore->cphone}}" placeholder="c_phone">
                    </div>
                    <br>
                    <div class="col-12">
                        <label class="form-label"><b>Product </b> </label>
                        <input type="text" class="form-control" name="p_name" value="{{$servicestore->p_name}}" placeholder="product">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Product Code </b> </label>
                        <input type="text" class="form-control" name="p_code" value="{{$servicestore->p_code}}" placeholder="product code">
                    </div>
                    <br>
                    <div class="col-12">
                        <label class="form-label"><b>Description</b></label>
                        <textarea name="pdescription" class="form-control" id="" cols="30" rows="10" placeholder="Description">{{$servicestore->pdescription}} </textarea>
                    </div>
                    <br>

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