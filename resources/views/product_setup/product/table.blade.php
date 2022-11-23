@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">All product</h2>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product">Create New product</button>
        <!-- Modal -->
        <div class="modal fade" id="product" tabindex="-1" aria-labelledby="productLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productLabel">Create New product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data">
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
                            <!-- category & sub-category -->
                            <div class="border p-3 rounded">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label class="form-label">Category Name</label>
                                        <select name="category_id" id="categoryID" class="form-control">
                                            <option value="">-- SELECT --</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Sub-Category Name</label>
                                        <select name="sub_category_id" id="subCategoryID" class="form-control">
                                            <option value="">-- SELECT --</option>
                                            @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- branch & warehouse -->
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label class="form-label">Branch Name</label>
                                        <select name="branch_id" id="branchID" class="form-control">
                                            <option value="">-- SELECT --</option>
                                            @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Warehouse Name</label>
                                        <select name="warehouse_id" id="warehouseID" class="form-control">
                                            <option value="">-- SELECT --</option>
                                            @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Product -->
                                <div class="form-group mb-2">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label">Image</label>
                                    <input type="file" accept="image/*" class="form-control" name="image" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" required>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-6">
                                        <label class="form-label">Offer</label>
                                        <input type="text" class="form-control" name="offer" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Warranty Days</label>
                                        <input type="text" class="form-control" name="warranty" required>
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label">Description</label>
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
                    <th>cat-name</th>
                    <th>sub-catname</th>
                    <th>branch</th>
                    <th>warehouse</th>

                    <th>Name</th>
                    <th>image</th>
                    <th>price</th>
                    <th>offer</th>
                    <th>warranty</th>
                    <th>description</th>

                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $key=>$product)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->subCategory->name }}</td>
                    @if(empty( $product->branch->name ))
                    <td class="text-danger"> no branch </td>
                    @else
                    <td>{{ $product->branch->name }}</td>
                    @endif

                    @if(empty( $product->warehouse->name ))
                    <td class="text-danger"> no warehouse </td>
                    @else
                    <td>{{ $product->warehouse->name }}</td>
                    @endif

                    <td>{{ $product->name }}</td>
                    <td><img src=" {{ asset('/uploads/products/'.$product->image) }}" alt="" style="height:80px;width:80px;"></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->offer }}</td>
                    <td>{{ $product->warranty }}</td>
                    <td>{{ $product->description }}</td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.view.product', $product->id) }}" style="font-size:13px"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-success" href="{{ route('admin.edit.product', $product->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('admin.delete.product', $product->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No product available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

ajax
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // category & sub-category
        $('#categoryID').change(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).val();

            $.ajax({
                type: "GET",
                url: "/backend/product-setup/get/category/wise/sub-cat/" + id,
                dataType: "json",
                success: function(response) {
                    $('#subCategoryID').html(response);
                },
                error: function(error) {
                    alert('ajax error');
                }
            });

        });

        // Branch & warehouse 
        $('#branchID').change(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).val();
            // alert(id);
            $.ajax({
                type: "GET",
                url: "/backend/product-setup/get/branch/wise/warehouse/" + id,
                dataType: "json",
                success: function(response) {
                    $('#warehouseID').html(response);
                },
                error: function(error) {
                    alert('ajax error');
                }
            });
        });

    });
</script>