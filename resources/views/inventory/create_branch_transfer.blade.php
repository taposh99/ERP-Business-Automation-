@extends('layouts.app')
@section('content')
<section>
    <br><br>
    <h2 class="my-4 text-center">Create Transfer From Branch product</h2>
    <br>
    <!-- message -->
    @if(session()->has('message'))
    <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
    @elseif(session()->has('error'))
    <p class="alert alert-danger text-center">{{ session()->get('error') }}</p>
    @endif
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <!-- select branch -->
                <div class="col-12 mb-4">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Branches
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @forelse ($branches as $branch)
                            <li><a class="dropdown-item" href="{{ route('inventory.B.P',$branch->id) }}">{{ $branch->name }}</a></li>
                            @empty
                            <li><a class="dropdown-item" href="#">Empty Branch</a></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <!-- select item -->
                <div class="col-12">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>Product code</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>&nbsp;&nbsp; Action&nbsp;<i class="fa fa-paper-plane"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($branchProducts as $product)
                            <tr class="text-center">
                                <td><img src="{{ asset('/uploads/products/'.$product->image) }}" style="height:50px;width:50px;"> </td>
                                <td> {{ $product->id }} </td>
                                <td> {{ $product->name }} </td>
                                <td>{{ !empty($product->stock->total_qty) ? $product->stock->total_qty : 'null' }}</td>
                                <!-- add -->
                                <td>
                                    <a class="btn btn-success" href="{{ route('inventory.B.P.transfer',$product->id) }}" style="font-size:13px"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
        <div class="d-flex justify-content-end">
            <a href="{{ route('branch.product.transfered') }}" class="btn btn-primary">View Transfer</a>
        </div>
    </div>
</section>
@endsection