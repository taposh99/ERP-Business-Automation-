@extends('layouts.app')
@section('tittle')
Add Expenses Category
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Add Category</h3>
                </div>
                <!-- message -->
                @if(session()->has('message'))
                <p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
                @elseif(session()->has('error'))
                <p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
                @endif
                <div class="card-body">
                    <form action="{{ route('new-category') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="text" name="category_name" placeholder="Category" required />
                            <label for="inputEmail">Category</label>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <input type="submit" class="form-control btn btn-success" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection