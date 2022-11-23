@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Expenses Head</h2>
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">Add Expenses Head</button>
        <!-- Modal -->
        <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="row">
                        <div class="col-6">
                            <div class="modal-header">
                                <h5 class="modal-title" id="userCreateModelLabel">Add Expenses Head</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary" style="margin-top: 10px;height: 34px;">
                                <a class="nav-link" href="{{ route('add-expenses-category') }}" style="color: white; margin-top: -10px;">Add Expenses Type</a>
                            </button>
                        </div>
                    </div>

                    <form action="{{  route('add-expenses') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">

                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="e.g Electricity Bill" required>
                                </div>
                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                                <br>

                                <div class="col-12">
                                    <select class="form-control" name="category_id" id="" required>
                                        <option value="">Select expenses type</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                                <br>
                                
                                
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>

                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="submit">
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
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>DESCRIPTION</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
                @php $i=1; @endphp
                @foreach($categories as $category)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->category_id}}</td>
                    <td>{{$category->description}}</td>

                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route ('edit-expenses-head',['id'=>$category->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('delete-expenses-head')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="expenseshead_id" value="{{$category->id}}">
                                <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>



    @endsection