@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">Sales Estimate</h2>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brand">Create New Sales</button>
        <!-- Modal -->
        <div class="modal fade" id="brand" tabindex="-1" aria-labelledby="brandLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="brandLabel">Create New Sales</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="#" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{-- <div class="message">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div> --}}

                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Customer</label>
                                    <input type="text" class="form-control" name="" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Invoice</label>
                                    <input type="text" class="form-control" name="" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Total</label>
                                    <input type="text" class="form-control" name="" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">isInvoice</label>
                                    <input type="text" class="form-control" name="" required>
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
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Invoice</th>
                    <th>Total</th>
                    <th>Note</th>
                    <th>isInvoice</th>

                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                {{-- @forelse ($brands as $key=>$brand) --}}
                <tr>
                    {{-- <td>{{ $key+1 }} </td> --}}
                    <td></td>
                    <td></td>

                    <td>
                        {{-- <a class="btn btn-success" href="#" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a> --}}
                        {{-- <a class="btn btn-danger" href="#" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a> --}}
                    </td>
                </tr>
                {{-- @empty --}}
                <p class="text-danger text-center">No brand available</p>
                {{-- @endforelse --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
