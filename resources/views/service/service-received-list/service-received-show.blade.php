@extends('layouts.app')
@section('tittle')
Expenses Record List
@endsection

@section('content')
<div class="card mb-4" style="margin-top: 22px;">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Expenses Record List
        <a href="{{route('service-received-create')}}" class="btn btn-success">Service Receive Create</a>
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
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Invoice</th>
                    <th>Phone</th>
                    <th>Product</th>
                    <th>Product Code</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($servicestore as $servicestoredata)

                <tr>
                    <td>{{ $i++ }} </td>
                    <td>{{ $servicestoredata->deli_date }} </td>
                    <td>{{ $servicestoredata->cname }} </td>
                    <td>{{ $servicestoredata->invoice_no }} </td>
                    <td>{{ $servicestoredata->cphone }} </td>
                    <td>{{ $servicestoredata->p_name }} </td>
                    <td>{{ $servicestoredata->p_code }} </td>
                    <td>{{ $servicestoredata->caddress }} </td>
                    <td>{{ $servicestoredata->pdescription }} </td>


                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('service-received-edit',['id'=>$servicestoredata->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('service-received-delete')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="servicestoredelete_id" value="{{$servicestoredata->id}}">
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