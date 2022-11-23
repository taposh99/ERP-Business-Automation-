@extends('layouts.app')
@section('content')
<section>
    <br><br>
    <h2 class="my-4 text-center">Create Transfer From Branch product</h2>
    <br>
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <!-- select branch -->
                <div class="col-12 col-lg-12">

                </div>
                <!-- select item -->
                <div class="col-12 col-lg-6">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>&nbsp;&nbsp; Action&nbsp;<i class="fa fa-paper-plane"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($branchProducts as $product)
                            <tr class="text-center">
                                <td><img src="{{ asset('/uploads/products/'.$product->image) }}" style="height:50px;width:50px;"> </td>
                                <td> {{ $product->name }} </td>
                                <td>{{ $product->id }}</td>
                                <!-- add -->
                                <td>
                                    <a class="btn btn-success w-50" href="{{ route('inventory.B.P.transfer',$product->id) }}" style="font-size:13px"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @empty
                            <p class="text-danger text-center">No data available</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-info">Show Product</a>
                <!-- showing selected items -->
                <div class="col-12 col-lg-6" style="background-color: #ecf0f1;">
                    <div class="my-4">
                        <form action="#" method="POST">
                            @csrf
                            <table class="table table-hover table-bordered table-responsive">
                                <thead class="bg-light text-center">
                                    <tr>
                                        <th>SL</th>
                                        <th>Branch Code</th>
                                        <th>Branch Name</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse ($previewDeliveries as $data)
                                    <tr>
                                        <td>{{ $data['branch_id'] }}</td>
                                        <td>{{ $data['branch_name'] }}</td>
                                        <td>{{ $data['product_id'] }}</td>
                                        <td>{{ $data['product_name'] }}</td>
                                        <!-- hidden input -->
                                        <input type="hidden" name="branch_id" value="{{ $data ['branch_id'] }}" class="form-control w-50">
                                        <input type="hidden" name="product_id" value="{{ $data['product_id'] }}" class="form-control w-50">
                                        <td class="d-flex justify-content-center">
                                            <input type="number" name="total_product" value="{{ $data['qty'] }}" class="form-control w-50">
                                        </td>

                                        <td>
                                            <a class="btn btn-danger" href="#" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <p class="text-danger text-center">No data available</p>
                                    @endforelse
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr class="text-center">
                                        <td colspan="2">Total:</td>
                                        <td colspan="2">100</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('inventory.transfer_branch.clear') }}" class="btn btn-danger"> Empty</a>
                                <button type="submit" class="btn btn-success">Transfer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection