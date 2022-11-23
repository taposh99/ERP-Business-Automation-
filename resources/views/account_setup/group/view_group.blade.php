@extends('layouts.app')
@section('content')

<form action="{{ route('admin.change.product.image',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <!-- image -->
        <div class="image">
            <img src="{{ asset('/uploads/products/'.$product->image ) }}" alt="" class="img-fluid w-100" style="height:600px;">
        </div>
        <div class="message">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <!-- change file -->
        <div class="border p-3 rounded">
            <div class="col-12">
                <label class="form-label">image</label>
                <input type="file" accept="image/*" class="form-control" name="image" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Change</button>
    </div>
</form>
@endsection