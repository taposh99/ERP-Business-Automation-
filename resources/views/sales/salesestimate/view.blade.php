@extends('layouts.app')
@section('content')
<section>
    <br><br>
    <h2 class="my-4 text-center">View sales product data</h2>
    <br>
    <!-- message -->
    @if(session()->has('message'))
    <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
    @elseif(session()->has('error'))
    <p class="alert alert-danger text-center">{{ session()->get('error') }}</p>
    @endif
    <div class="mt-4">
        @if ($previewDeliveries)
        <div class="container">
            <div class="row">
                <!-- selected item -->
                <div class="col-12">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Product code</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($previewDeliveries as $key=>$data)
                            <tr class="text-center">
                                <td> {{ $data['product_id'] }} </td>
                                <td> {{ $data['product_name'] }} </td>
                                <td> {{ $data['product_price'] }} </td>
                                <td> {{ $data['qty'] }} </td>
                                <!-- remove -->
                                <td>
                                    <a class="btn btn-danger" href="{{ route('sales.estimate.product.delete',$key) }}" style="font-size:13px"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                            <p class="text-danger text-center">No data available</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('clear.sales.estimate.product') }}" class="btn btn-danger">Clear all</a>
            <a href="#" class="btn btn-success">Save</a>
        </div>
        @else
        <p class="text-center text-danger font-weight-bold"> No data available </p>
        @endif
    </div>
</section>
@endsection