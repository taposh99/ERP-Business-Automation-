@extends('layouts.app')
@section('content')
<br>
<h2 class="mt-4 mb-4">Branch Stock</h2>

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
                    <th>Branch Code</th>
                    <th>Name</th>
                    <th>Total Warehouse</th>
                    <th>Total product</th>
                    <th>Product Stock</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($branches as $key=>$branch)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $branch->id }}</td>
                    <td>{{ $branch->name }}</td>
                    <td>{{ count($branch->warehouse) }}</td>
                    <td>{{ count($branch->product) }}</td>
                    <td>{{ $branch->total_stock_product }}</td>
                </tr>
                @empty
                <p class="text-danger text-center">No branch available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection