@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Purchase Invoice</h2>
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


                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">

                                <div class="col-12">
                                    <label class="form-label"><b>Date</b></label>
                                    <input type="date" class="form-control" name="" placeholder="e.g  10/11/2022" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label"><b>Brunch</b></label>
                                    <input type="text" class="form-control" name="" placeholder="e.g  hp-12012" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Supplier</b></label>
                                    <input type="text" class="form-control" name="" placeholder="e.g 520" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>invoice</b></label>
                                    <input type="text" class="form-control" name="" placeholder="e.g waiting" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Total</b></label>
                                    <input type="text" class="form-control" name="" placeholder="e.g waiting" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Note</b></label>
                                    <input type="text" class="form-control" name="" placeholder="e.g waiting" required>
                                </div>


                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="save" required>
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
                    <th>Date</th>
                    <th>Brunch</th>
                    <th>Supplier</th>
                    <th>Invoice</th>
                    <th>Total</th>
                    <th>Note</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>



                <tr>
                    







                    <td>
                        <div style="min-width: 10rem;">
                            {{-- <a class="btn btn-success" style="font-size:13px" href="" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a> --}}
                            <form action="" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="warranty_delete" value="">
                                {{-- <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button> --}}
                            </form>
                        </div>

                    </td>
                </tr>


            </tbody>

        </table>
    </div>



    @endsection