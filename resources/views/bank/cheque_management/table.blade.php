@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="pt-4"></div>
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif

    <div class="d-flex justify-content-between align-items-center mt-4">
        <h2 class="mt-4 mb-4">Cheque Management</h2>
        <span>
            <a type="button" class="btn btn-primary" href="{{route('manage-cheque.create')}}">Add Cheque</a>
        </span>
    </div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <p class="mb-0 font-weight-bold">Received Cheque</p>
            
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Date</th>
                        <th>Invoice/Received</th>
                        <th>Cheque No</th>
                        <th>Chreque Date</th>
                        <th>A/C No</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Client</th>
                        <th>Cheque Bank</th>
                        <th>Note</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Date</th>
                        <th>Invoice/Received</th>
                        <th>Cheque No</th>
                        <th>Chreque Date</th>
                        <th>A/C No</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Client</th>
                        <th>Cheque Bank</th>
                        <th>Note</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                        
                    @endphp
                        
                    
                @foreach($received_cheques as $cheque)
                    @php
                        $serial++; 
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td>{{ $cheque->date }}</td>
                        <td>{{ $cheque->tran_no }}</td>
                        <td>{{ $cheque->cheque_no }}</td>
                        <td>{{ $cheque->cq_date }}</td>
                        <td>{{ $cheque->ac_number }}</td>
                        <td>{{ $cheque->amount }}</td>
                        <td>{{ $cheque->status }}</td>
                        <td>{{ $cheque->client }}</td>
                        <td>{{ $cheque->cheque_bank }}</td>
                        <td>{{ $cheque->note }}</td>
                        <td style="text-align: right;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('manage-cheque.edit',$cheque->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            
                            <form action="{{ route('manage-cheque.destroy', $cheque->id) }}" method="POST" style="display:inline">
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
{{-- //////////Given Cheque////////// --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <p class="mb-0 font-weight-bold">Given Cheque</p>
       
    </div>
    <div class="card-body">
        <table id="datatablesSimple2">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Invoice/Deposit</th>
                    <th>Cheque No</th>
                    <th>Chreque Date</th>
                    <th>A/C No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Cheque Bank</th>
                    <th>Note</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Invoice/Received</th>
                    <th>Cheque No</th>
                    <th>Chreque Date</th>
                    <th>A/C No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Cheque Bank</th>
                    <th>Note</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @php
                    $serial = 0;
                    
                @endphp
                    
                
            @foreach($given_cheques as $cheque)
                @php
                    $serial++; 
                @endphp
    
                <tr>
                    <td>{{ $serial }}</td>
                    <td>{{ $cheque->date }}</td>
                    <td>{{ $cheque->tran_no }}</td>
                    <td>{{ $cheque->cheque_no }}</td>
                    <td>{{ $cheque->cq_date }}</td>
                    <td>{{ $cheque->ac_number }}</td>
                    <td>{{ $cheque->amount }}</td>
                    <td>{{ $cheque->status }}</td>
                    <td>{{ $cheque->client }}</td>
                    <td>{{ $cheque->cheque_bank }}</td>
                    <td>{{ $cheque->note }}</td>
                    <td style="text-align: right;">
                        <a class="btn btn-success" style="font-size:13px" href="{{route('manage-cheque.edit',$cheque->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                        
                        <form action="{{ route('manage-cheque.destroy', $cheque->id) }}" method="POST" style="display:inline">
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

{{-- //////////Deposit Cheque////////// --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <p class="mb-0 font-weight-bold">Deposit Cheque</p>
        
    </div>
    <div class="card-body">
        <table id="datatablesSimple3">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Invoice/Deposit</th>
                    <th>Cheque No</th>
                    <th>Chreque Date</th>
                    <th>A/C No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Cheque Bank</th>
                    <th>Note</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Invoice/Received</th>
                    <th>Cheque No</th>
                    <th>Chreque Date</th>
                    <th>A/C No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Cheque Bank</th>
                    <th>Note</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @php
                    $serial = 0;
                    
                @endphp
                    
                
            @foreach($deposit_cheques as $cheque)
                @php
                    $serial++; 
                @endphp
    
                <tr>
                    <td>{{ $serial }}</td>
                    <td>{{ $cheque->date }}</td>
                    <td>{{ $cheque->tran_no }}</td>
                    <td>{{ $cheque->cheque_no }}</td>
                    <td>{{ $cheque->cq_date }}</td>
                    <td>{{ $cheque->ac_number }}</td>
                    <td>{{ $cheque->amount }}</td>
                    <td>{{ $cheque->status }}</td>
                    <td>{{ $cheque->client }}</td>
                    <td>{{ $cheque->cheque_bank }}</td>
                    <td>{{ $cheque->note }}</td>
                    <td style="text-align: right;">
                        <a class="btn btn-success" style="font-size:13px" href="{{route('manage-cheque.edit',$cheque->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                        
                        <form action="{{ route('manage-cheque.destroy', $cheque->id) }}" method="POST" style="display:inline">
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


{{-- //////////Payment Cheque////////// --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <p class="mb-0 font-weight-bold">Payment Cheque</p>
        
    </div>
    <div class="card-body">
        <table id="datatablesSimple4">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Invoice/Deposit</th>
                    <th>Cheque No</th>
                    <th>Chreque Date</th>
                    <th>A/C No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Cheque Bank</th>
                    <th>Note</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Invoice/Received</th>
                    <th>Cheque No</th>
                    <th>Chreque Date</th>
                    <th>A/C No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Cheque Bank</th>
                    <th>Note</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @php
                    $serial = 0;
                    
                @endphp
                    
                
            @foreach($payment_cheques as $cheque)
                @php
                    $serial++; 
                @endphp
    
                <tr>
                    <td>{{ $serial }}</td>
                    <td>{{ $cheque->date }}</td>
                    <td>{{ $cheque->tran_no }}</td>
                    <td>{{ $cheque->cheque_no }}</td>
                    <td>{{ $cheque->cq_date }}</td>
                    <td>{{ $cheque->ac_number }}</td>
                    <td>{{ $cheque->amount }}</td>
                    <td>{{ $cheque->status }}</td>
                    <td>{{ $cheque->client }}</td>
                    <td>{{ $cheque->cheque_bank }}</td>
                    <td>{{ $cheque->note }}</td>
                    <td style="text-align: right;">
                        <a class="btn btn-success" style="font-size:13px" href="{{route('manage-cheque.edit',$cheque->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                        
                        <form action="{{ route('manage-cheque.destroy', $cheque->id) }}" method="POST" style="display:inline">
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

{{-- //////////Bounce Cheque////////// --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <p class="mb-0 font-weight-bold">Bounced Cheque</p>
        
    </div>
    <div class="card-body">
        <table id="datatablesSimple5">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Invoice/Deposit</th>
                    <th>Cheque No</th>
                    <th>Chreque Date</th>
                    <th>A/C No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Cheque Bank</th>
                    <th>Note</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Invoice/Received</th>
                    <th>Cheque No</th>
                    <th>Chreque Date</th>
                    <th>A/C No</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Client</th>
                    <th>Cheque Bank</th>
                    <th>Note</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @php
                    $serial = 0;
                    
                @endphp
                    
                
            @foreach($return_cheques as $cheque)
                @php
                    $serial++; 
                @endphp
    
                <tr>
                    <td>{{ $serial }}</td>
                    <td>{{ $cheque->date }}</td>
                    <td>{{ $cheque->tran_no }}</td>
                    <td>{{ $cheque->cheque_no }}</td>
                    <td>{{ $cheque->cq_date }}</td>
                    <td>{{ $cheque->ac_number }}</td>
                    <td>{{ $cheque->amount }}</td>
                    <td>{{ $cheque->status }}</td>
                    <td>{{ $cheque->client }}</td>
                    <td>{{ $cheque->cheque_bank }}</td>
                    <td>{{ $cheque->note }}</td>
                    <td style="text-align: right;">
                        <a class="btn btn-success" style="font-size:13px" href="{{route('manage-cheque.edit',$cheque->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                        
                        <form action="{{ route('manage-cheque.destroy', $cheque->id) }}" method="POST" style="display:inline">
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