@extends('layouts.app')
@section('content')
@if(session('success'))
<div class="alert alert-success mt-4" role="alert">
    {{session('success')}}
</div>
@endif
    <h2 class="mt-4 mb-4">All User</h2>
    <div class="card mb-4">
        @can('User create')
        <div class="card-header d-flex justify-content-between">
            <span>
            </span>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">Create New User</button>
                            <!-- Modal -->
                <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="userCreateModelLabel">Create New User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="create-user" method="POST" action="{{route('users.store')}}">
                            <div class="modal-body">
                                      <div class="border p-3 rounded">
                                       
                                        <div class="col-12">
                                          <label class="form-label">Name</label>
                                          <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>

                                        <div class="col-12">
                                          <label class="form-label">Email Address</label>
                                          <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="alert alert-danger mt-2" id="email_error" style="display: none"></div>
 
                                        <div class="col-12">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone_number" >
                                        </div>
                                        <div class="alert alert-danger mt-2" id="phone_number_error" style="display: none"></div>

                                        <div class="col-12">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Conform Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                        <div class="alert alert-danger" id="password_error" style="display: none"></div>

 
                                        <h6>Roles</h6>
                                        
                                            <div class="grid grid-cols-3 gap-4">
                                            @foreach($roles as $role)
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault{{$role->id}}" name="roles[] "value="{{$role->id}}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault{{$role->id}}">{{ $role->name }}</label>
                                            </div>
                                            @endforeach
                                            </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                        @csrf
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Create User</button>
                                    </div>
                            </div>
                            
                        </form>
                        </div>
                    </div>
                </div>
                @endcan
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Access</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Access</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $serial = 0;
                    @endphp
                        
                    
                @foreach($users as $user)
                    @php
                        $serial++;
                    @endphp
        
                    <tr>
                        <td>{{ $serial }}</td>
                        <td style="text-align: center">
                            @if ($user->image === null)
                                <img src="{{asset('images/unknown_profile.png')}}" height="35px" width="35px" style="border: 1px solid #dddbdb; border-radius: 50%;">
                            @else
                                
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            @foreach($user->roles as $role)
                               <span class="badge" style="background-color: #0a58ca">{{ $role->name }}</span>
                             @endforeach    
                        </td>
                        <td>
                            @can('User edit')
                            <a class="btn btn-success" style="font-size:13px" href="{{route('users.edit',$user->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                            @endcan
                            
                            @can('User delete')
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" style="font-size:13px " role="button"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                
                @endforeach
            </tbody>
            </table>
        </div>
</div>


@endsection