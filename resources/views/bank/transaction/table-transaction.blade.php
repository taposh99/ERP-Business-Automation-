@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="pt-4"></div>
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif

    <h2 class="mt-4 mb-4">All Transaction</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            Transaction
            <span>
                <a type="button" class="btn btn-primary" href="{{route('transanction.create')}}">Create Transanction</a>
            </span>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                        
                    @endphp
                        
                    
                @foreach($transactions as $transaction)
                    @php
                        $serial++; 
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td>{{ $transaction->date }}</td>
                        <td>{{ $transaction->tran_no }}</td>
                        <td>{{ $transaction->total_amount }}</td>
                        <td>{{ $transaction->note }}</td>
                        <td style="text-align: right;">
                            {{-- <a class="btn btn-success" style="font-size:13px" href="{{route('transanction.edit',$transaction->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> --}}
                            
                            <form action="{{ route('transanction.destroy', $transaction->tran_no) }}" method="POST" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" style="font-size:13px " role="button"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
            </table>
        </div>
</div>


@endsection