@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Price List</h2>
<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">New Create</button>
        <!-- Modal -->
        <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <form action="{{route('price-list-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">


                                <div class="col-12">
                                    <label class="form-label"><b>Name</b></label>
                                    <input type="text" class="form-control" name="name" placeholder="e.g  hp" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Code List</b></label>
                                    <input type="text" class="form-control" name="code" placeholder="e.g 520" {!! DNS2D::getBarcodeHTML("$productCode") !!}>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Barcode List</b></label>
                                    <input type="text" id="barcode" class="form-control" name="barcode" placeholder="e.g barcode">
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Available Qty</b></label>
                                    <input type="text" class="form-control" name="qty" placeholder="e.g 520">
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b> Old Price</b></label>
                                    <input type="text" class="form-control" name="o_price" placeholder="e.g 100">
                                </div>

                                <div class="col-12">
                                    <label class="form-label"><b> Current Price</b></label>
                                    <input type="text" class="form-control" name="c_price" placeholder="e.g 100" required>
                                </div>


                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input id="submitbutton" type="submit" class="btn btn-primary" value="save" required>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>

                <tr>
                    <th>SN</th>
                    <th>Name list</th>
                    <th>Code list</th>
                    <th>BarCode List</th>
                    <th>Available Qty</th>
                    <th>Old Price list </th>
                    <th>Current Price list </th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>



                @php $i=1 @endphp
                @foreach($PriceList as $PriceLists)
                <tr>
                    <td>{{ $i++ }} </td>
                    <td>{{ $PriceLists->name }} </td>
                    <td>{{ $PriceLists->code }} </td>
                    <td>{{ $PriceLists->barcode }} </td>
                    <td>{{ $PriceLists->qty }} </td>
                    <td>{{ $PriceLists->o_price }} </td>
                    <td>{{ $PriceLists->c_price }} </td>

                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('price-list-edit',['id'=>$PriceLists->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('price-list-delete')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="price_list_delete" value="{{$PriceLists->id}}">
                                <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>

    <script src="JsBarcode.all.min.js"></script>
    <script>
        document.getElementById('submitbutton').addEventListener('click',function(){
            var text = document.getElementById('barcode').value;
        })
    </script>

    @endsection
