<?php

namespace App\Http\Controllers\Backend\UserAndRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('role_or_permission:Role access|Role create|Role edit|Role delete', ['only' => ['index','show']]);
        // $this->middleware('role_or_permission:Role create', ['only' => ['create','store']]);
        // $this->middleware('role_or_permission:Role edit', ['only' => ['edit','update']]);
        // $this->middleware('role_or_permission:Role delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role= Role::latest()->get();

        return view('user_and_roles.roles.table',['roles'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = DB::select('SELECT DISTINCT group_id, group_name FROM `permissions`;');

        return view('user_and_roles.roles.add',['modules' => $modules ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        foreach($request->module_access as $modules){
            $modules_id = DB::table('permissions')->select('id')->where('group_id', '=', $modules)->get();
            $request->permissions;
            
           foreach ($modules_id as $key => $value) {
           $module_ids[] = $value->id;
           }
           
           $selected_permission[] = array_intersect($request->permissions, $module_ids);
            
        }
        $permissions = call_user_func_array('array_merge', $selected_permission);

        $request->validate([
            'role_name'=>'required',
            'role_description'=>'required',
            'role_status' => 'required'
            ]);

            $role = Role::create([
                'name'=>$request->role_name,
                'desc'=>$request->role_description,
                'status'=>$request->role_status,
            ]);
        $role->syncPermissions($permissions);
        
        return redirect()->route('roles.index')->withSuccess('Role created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        
        $modules = DB::select('SELECT DISTINCT group_id, group_name FROM `permissions`;');

        //$permission = Permission::get();
        $role->permissions;
        return view('user_and_roles.roles.edit',['modules' => $modules, 'role'=> $role ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        
        foreach($request->module_access as $modules){
            $modules_id = DB::table('permissions')->select('id')->where('group_id', '=', $modules)->get();
            $request->permissions;
            
           foreach ($modules_id as $key => $value) {
           $module_ids[] = $value->id;
           }
           
           $selected_permission[] = array_intersect($request->permissions, $module_ids);
            
        }
        $permissions = call_user_func_array('array_merge', $selected_permission);

        $request->validate([
            'role_name'=>'required',
            'role_description'=>'required',
            'role_status' => 'required'
            ]);

            $role->update([
                'name'=>$request->role_name,
                'desc'=>$request->role_description,
                'status'=>$request->role_status,
            ]);
            $role->syncPermissions($permissions);
        
            return redirect()->route('roles.index')->withSuccess('Role Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->withSuccess('Role deleted Successfully!');
    }
}
