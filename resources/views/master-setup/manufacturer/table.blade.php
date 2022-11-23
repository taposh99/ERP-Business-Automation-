@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">All Manufacturer</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#manufacturer">Create New Manufacturer</button>
        <!-- Modal -->
        <div class="modal fade" id="manufacturer" tabindex="-1" aria-labelledby="manufacturerLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="manufacturerLabel">Create New Manufacturer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="{{ route('admin.store.manufacturer') }}" method="POST">
                        @csrf
                        <div class="modal-body">
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

                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Contact</label>
                                    <input type="text" class="form-control" name="contact" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Main Product</label>
                                    <textarea class="form-control" name="m_product" cols="30" rows="4" required></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- table -->
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Main Product</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($manufacturers as $key=>$manufacturer)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $manufacturer->name }}</td>
                    <td>{{ $manufacturer->contact }}</td>
                    <td>{{ $manufacturer->address }}</td>
                    <td>{{ $manufacturer->m_product }}</td>

                    <td>
                        <a class="btn btn-success" href="{{ route('admin.edit.manufacturer', $manufacturer->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('admin.delete.manufacturer', $manufacturer->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No band available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection