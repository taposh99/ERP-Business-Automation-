@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
@endif

<div class="card mt-4">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-2">
      Edit Role
    </h5>
    
  </div>
  <div class="card-body">
    <div class="p-4 border rounded">
      <form class="g-3 needs-validation" method="POST" action="{{route('roles.update', $role->id)}}">

        <div class="row">
          <div class="col-md-6">
            <label for="validationCustom05" class="form-label">Role Name</label>
            <input type="text" name="role_name"  value="{{ old('role_name',$role->name) }}" class="form-control" id="validationCustom05" required>


            <label for="roledescription" class="form-label mt-4">Role Description</label>
            <textarea class="form-control" rows="4" name="role_description" required>{{old('role_description',$role->desc)}}</textarea>


            <label for="rolestatus" class="form-label mt-4">Status</label>
            <select class="form-select" id="rolestatus" name="role_status" required>
              @php
                  if($role->status === 0){
                    $status = '';
                  }else{
                    $status = 'selected';
                  }
              @endphp
              <option {{$status}} value="0">Inactive</option>
              <option {{$status}} value="1">Active</option>
            </select>
          </div>
          <div class="col-md-6">
            <h4>Module Access</h4>
            <div class="module-content mt-4">

              @foreach( $modules as $module)
                <div class="form-check form-switch m-2">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="module_access[]" value="{{$module->group_id}}" onclick='$("#roletable{{$module->group_id}}").fadeToggle(900,"swing");' @if (count($role->permissions->where('group_id',$module->group_id)) )
                      checked
                  @endif>
                  <label class="form-check-label" for="flexSwitchCheckChecked">{{$module->group_name}}</label>
                </div>
              @endforeach
            </div>
          </div>
        </div>


        @foreach( $modules as $module_group) 
          <table class="table mt-4" id="roletable{{$module_group->group_id}}" @if ( count($role->permissions->where('group_id',$module_group->group_id)) === 0)
            style="display:none"
            @endif>
            <thead class="table-dark">
              <tr>
                <th scope="col">{{$module_group->group_name}}</th>
                <th scope="col">Read</th>
                <th scope="col">Edit</th>
                <th scope="col">Create</th>
                <th scope="col">Delete</th>
                <th scope="col">Print</th>
              </tr>
            </thead>
            <tbody>
              @php
                unset($submodules);
                unset($permission_name);
                unset($permission);
               $submodules = \Spatie\Permission\Models\Permission::where(['group_id' => $module_group->group_id])->get();
               
               foreach ($submodules as $key => $value) {

                    $permission_name = explode(" ", $value->name );
                    $sliced_permission_name = array_slice($permission_name, 0, -1);
                    $permission[$value->id] = implode(" ", $sliced_permission_name);
                }

                foreach($permission as $key => $value ){
                    $sub_module[] =$value;
                }
                $sub_module = array_chunk($permission,5,true);
                
             @endphp
              @foreach ($sub_module as $sub_mod)
              
              <tr>
                <th scope="row">{{reset($sub_mod)}}</th>

                @foreach ($sub_mod as $key => $value)
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$key}}" @if(count($role->permissions->where('id',$key)))
                        checked 
                      @endif
                      >
                    </div>
                  </td>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
          @endforeach
        <div class="d-flex justify-content-end">
            <a href="{{route('roles.index')}}" class="btn btn-secondary mt-4" style="margin-right: 1rem">Cancel</a>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
        </div>
        @csrf
        @method('put')
      </form>
    </div>
    

  </div>
</div>
@endsection