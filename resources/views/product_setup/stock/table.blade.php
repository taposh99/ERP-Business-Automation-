@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">All stock</h2>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stock">Create New Stock</button>
        <!-- Modal -->
        <div class="modal fade" id="stock" tabindex="-1" aria-labelledby="stockLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stockLabel">Create New Stock</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="{{ route('admin.store.stock') }}" method="POST">
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
                                <!-- branch & warehouse -->
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label">Branch Name</label>
                                        <select name="branch_id" id="branchID" class="form-control">
                                            <option value="">-- SELECT --</option>
                                            @forelse ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @empty
                                            <option value="">-- SELECT --</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">warehouses Name</label>
                                        <select name="warehouse_id" id="warehouseID" class="form-control">
                                            <option value="">-- SELECT --</option>
                                            @forelse ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                            @empty
                                            <option value="">-- SELECT --</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <!-- product -->
                                    <div class="col-4">
                                        <label class="form-label">Product Name</label>
                                        <select name="product_id" id="productID" class="form-control">
                                            <option value="">-- SELECT --</option>
                                            @forelse ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @empty
                                            <option value="">-- SELECT --</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Total Product</label>
                                    <input type="number" class="form-control" name="total_qty" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">description</label>
                                    <textarea class="form-control" name="description" cols="30" rows="4" required></textarea>
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
                    <th>Product Code</th>
                    <th>branch Code</th>
                    <th>warehouse Code</th>
                    <th>Total product</th>
                    <th>description</th>

                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($stocks as $key=>$stock)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $stock->product_id }}</td>
                    <td>{{ $stock->branch_id }}</td>
                    <td>{{ $stock->warehouse_id }}</td>
                    <td>{{ $stock->total_qty }}</td>
                    <td>{{ $stock->description }}</td>

                    <td>
                        <a class="btn btn-success" href="{{ route('admin.edit.stock', $stock->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('admin.delete.stock', $stock->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No stock available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

<!-- ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Branch & warehouse 
        $('#branchID').change(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).val();
            $('#productID').empty();

            // ajax call for warehouse
            $.ajax({
                type: "GET",
                url: "/backend/product-setup/get/branch/wise/warehouse/" + id,
                dataType: "json",
                success: function(response) {
                    $('#warehouseID').html(response);
                },
                error: function(error) {
                    alert('ajax error');
                },
            });
        });

        // ajax call for product 
        $('#warehouseID').click(function() {
            var wid = $(this).val();
            // alert(wid);

            $.ajax({
                type: "GET",
                url: "/backend/product-setup/get/warehouse/wise/product/" + wid,
                dataType: "json",
                success: function(response) {
                    $('#productID').html(response);
                },
                error: function(error) {
                    alert('ajax error');
                },
            });
        });
    });
</script>