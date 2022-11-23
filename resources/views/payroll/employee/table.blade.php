@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="pt-4"></div>
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif
    <h2 class="mt-4 mb-4">All Employee</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span>
            </span>
            <a href="{{route('employee.create')}}" type="button" class="btn btn-primary" >Create New Employee</a>
                </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Id No</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Work Place</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Id No</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Work Place</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                    @endphp
                        
                    
                @foreach($employee as $employee)
                    @php
                        $serial++;
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td><img src="{{asset('images/employee/'.$employee->profile_image)}}" width="55px" height="55px"></td>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->designation->name }}</td>
                        <td>{{ $employee->department->name }}</td>
                        <td>{{ $employee->branch }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td style="text-align: right;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('employee.edit',$employee->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline">
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