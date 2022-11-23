@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="pt-4"></div>
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif
    <h2 class="mt-4 mb-4">LeaveType</h2>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <span>
            </span>
            <a href="{{route('leave-application.create')}}" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#designationCreateModel">Create New LeaveApplication</a>
                            <!-- Modal -->

                </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th rowspan="2">SN</th>
                        <th rowspan="2">Date</th>
                        <th rowspan="2">Employee</th>
                        <th rowspan="2">Leave</th>
                        <th colspan="3">Details</th>
                        <th rowspan="2">Status</th>
                        <th style="text-align: right;" rowspan="2">Action</th>
                    </tr>
                    <tr><th>From</th><th>To</th><th>Days</th></tr>
                </thead>
                <tfoot>
                    <tr>
                        <th rowspan="2">SN</th>
                        <th rowspan="2">Date</th>
                        <th rowspan="2">Employee</th>
                        <th rowspan="2">Leave</th>
                        <th colspan="3">Details</th>
                        <th rowspan="2">Status</th>
                        <th style="text-align: right;" rowspan="2">Action</th>
                    </tr>
                    <tr><th>From</th><th>To</th><th>Days</th></tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                    @endphp
                        
                    
                @foreach($leave_applications as $leave_application)
                    @php
                        $serial++;
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td>{{ $leave_application->apply_date }}</td>
                        <td>{{ $leave_application->employee->name }}</td>
                        <td>{{ $leave_application->leave_type->name }}</td>
                        <td>{{ $leave_application->leave_form }}</td>
                        <td>{{ $leave_application->leave_to }}</td>
                        @php
                            $start  = new Carbon\Carbon($leave_application->leave_form);
                            $end    = new Carbon\Carbon( $leave_application->leave_to);

                            $diff = $start->diff($end);
                        @endphp
                        <td>{{ $diff->d  }}</td>
                        <td>{{ $leave_application->status }}</td>
                        <td style="text-align: right;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('leave-application.edit',$leave_application->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            
                            <form action="{{ route('leave-application.destroy', $leave_application->id) }}" method="POST" style="display:inline">
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