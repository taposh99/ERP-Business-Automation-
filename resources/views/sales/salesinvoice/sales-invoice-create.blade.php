@extends('layouts.app')
@section('content')
<section>
    <br><br>
    <h2 class="my-4 text-center">Create sales invoice</h2>
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
                <!-- select item -->
                <div class="col-12">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Product code</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>&nbsp;&nbsp; Action&nbsp;<i class="fa fa-paper-plane"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($products as $product)
                            <tr class="text-center">
                                <td> {{ $product->id }} </td>
                                <td> {{ $product->name }} </td>
                                <td> {{ !empty($product->stock->total_qty) ? $product->stock->total_qty : 0 }} </td>
                                
                                <!-- add -->
                                <td>
                                    <a class="btn btn-success" href="#" style="font-size:13px"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
            <a href="#" class="btn btn-primary">View Transfer</a>
        </div>
    </div>
</section>
@endsection