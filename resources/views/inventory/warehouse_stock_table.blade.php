@extends('layouts.app')
@section('content')
<br>
<h2 class="mt-4 mb-4">Warehouse Stock</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Warehouse code</th>
                    <th>Warehouse name</th>
                    <th>Total product</th>
                    <th>Product stock</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($warehouses as $key=>$warehouse)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $warehouse->id }}</td>
                    <td>{{ $warehouse->name }}</td>
                    <td>{{ count($warehouse->product) }}</td>
                    <td>{{ $warehouse->total_stock_product }}</td>
                    
                </tr>
                @empty
                <p class="text-danger text-center">No warehouse available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection