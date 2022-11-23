@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif
    <h2 class="mt-4 mb-4">All Roles</h2>
    <div class="card mb-4">
        @can('Role create')
            <div class="card-header d-flex justify-content-between">
                <span>
                </span>
                <a href="{{route('roles.create')}}" class="btn btn-primary">Create New Role</a>
            </div>
        @endcan
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Role Name</th>
                        <th>Access</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Role Name</th>
                        <th>Access</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                    @endphp
                        
                    
                @foreach($roles as $role)
                    @php
                        $serial++;
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                        @foreach($role->permissions as $permission)
                            <span class="badge" style="background-color: #28a745;">{{ $permission->name }}</span>
                        @endforeach
                        </td>
                        <td>{{ $role->desc }}</td>
                        <td>
                            <div style="min-width: 10rem;">
                                <a class="btn btn-success" style="font-size:13px" href="{{route('roles.edit',$role->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" style="font-size:13px " role="button"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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