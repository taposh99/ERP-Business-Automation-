@extends('layouts.app')
@section('content')
<br><br>
<h2 class="my-4">Transfer From Branch</h2>

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
        <a href="{{ route('create.branch.transfer') }}" class="btn btn-primary">Create Transfer</a>
    </div>
    <!-- show tranfered data -->
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Transfer ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Total</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($transferedBranches as $key=>$branch)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->email }}</td>
                    <td>{{ $branch->phone }}</td>
                    <td>{{ $branch->address }}</td>
                </tr>
                @empty
                <p class="text-danger text-center">No data available</p>
                @endforelse


            </tbody>
        </table>
    </div>
</div>

@endsection