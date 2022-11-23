@extends('layouts.app')
@section('content')
<div class="mb-4"></div>
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Edit Expenses Record
                </h3>
                <!-- message -->
                @if(session()->has('message'))
                <p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
                @elseif(session()->has('error'))
                <p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="card" style="width: 500px">
        <div class="card-body">
            <div class="border p-3 rounded">
                <form action="{{ route ('update-expenses-record',$invoice->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label class="form-label">DATE</label>
                        <input type="text" class="form-control" name="date" value="{{ $invoice->date }}" placeholder="DATE">
                    </div>

                    <br>
                    <div class="col-12">
                        <label class="form-label">EXPENSES NO</label>
                        <input type="text" class="form-control" name="invno" value="{{ $invoice->invno}}" placeholder="EXPENSES NO">
                    </div>
                    <br>
                    <div class="col-12">
                        <label class="form-label">AMOUNT</label>
                        <input type="text" class="form-control" name="totalamount" value="{{ $invoice->totalamount}}" placeholder="AMOUNT">
                    </div>
                    <br>
                    <div class="col-12">
                        <label class="form-label">NOTE</label>
                        <input type="text" class="form-control" name="note" value="{{ $invoice->note}}" placeholder="note">
                    </div>
                    <br>

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection