@extends('layouts.app')
@section('tittle')
Expenses Record List
@endsection

@section('content')
<div class="card mb-4" style="margin-top: 22px;">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Expenses Record List
        <a href="{{route('create-expense')}}" class="btn btn-success" style="margin-left: 723px;">Create Expensive</a>
    </div>
    <!-- message -->
    @if(session()->has('message'))
    <p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
    @elseif(session()->has('error'))
    <p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
    @endif
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>

                <tr>
                    <th>SN</th>
                    <th>DATE</th>
                    <th>EXPENSES NO</th>
                    <th>AMOUNT</th>
                    <th>NOTE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $i++ }} </td>
                    <td>{{ $invoice->date }} </td>
                    <td>{{ $invoice->invno }} </td>
                    <td>{{ $invoice->totalamount }} </td>
                    <td>{{ $invoice->note }} </td>

                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('edit-expenses-record',['id'=>$invoice->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('delete-expenses-record')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
                                <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</div>
@endsection
