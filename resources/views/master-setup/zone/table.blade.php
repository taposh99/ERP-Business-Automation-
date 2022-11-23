@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">All Zone</h2>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#zone">Create New Zone</button>
        <!-- Modal -->
        <div class="modal fade" id="zone" tabindex="-1" aria-labelledby="zoneLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="zoneLabel">Create New Zone</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="{{ route('admin.store.zone') }}" method="POST">
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
                                <div class="col-12">
                                    <label class="form-label">District</label>
                                    <input type="text" class="form-control" name="district" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Zone</label>
                                    <textarea class="form-control" name="zone" cols="30" rows="4" required></textarea>
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
                    <th>District</th>
                    <th>Zone</th>

                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($zones as $key=>$zone)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $zone->district }}</td>
                    <td>{{ $zone->zone }}</td>

                    <td>
                        <a class="btn btn-success" href="{{ route('admin.edit.zone', $zone->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('admin.delete.zone', $zone->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No zone available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection