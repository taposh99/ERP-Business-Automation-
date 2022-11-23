@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">All Currency</h2>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#currency">Create New currency</button>
        <!-- Modal -->
        <div class="modal fade" id="currency" tabindex="-1" aria-labelledby="currencyLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="currencyLabel">Create New Currency</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="{{ route('admin.store.currency') }}" method="POST">
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
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Sort</label>
                                    <input type="text" class="form-control" name="sort" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Symbol</label>
                                    <input type="text" class="form-control" name="symbol" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Exchange Rate</label>
                                    <textarea class="form-control" name="ex_rate" cols="30" rows="4" required></textarea>
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
                    <th>Name</th>
                    <th>Sort</th>
                    <th>Symbol</th>
                    <th>Exchange Rate</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($currencys as $key=>$currency)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $currency->name }}</td>
                    <td>{{ $currency->sort }}</td>
                    <td>{{ $currency->symbol }}</td>
                    <td>{{ $currency->ex_rate }}</td>

                    <td>
                        <a class="btn btn-success" href="{{ route('admin.edit.currency', $currency->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('admin.delete.currency', $currency->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No currency available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection