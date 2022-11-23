<?php

namespace App\Http\Controllers\Backend\UserAndRoles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:User create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:User edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::latest()->get();
        $roles = Role::get();
        return view('user_and_roles.user.table',['users'=>$user, 'roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('user_and_roles.user.add',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $valid= Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'phone_number'=>'max:20|unique:users',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password'=>'required|confirmed'
        ]);

        if($valid->fails()){
            return response()->json([
                'status'=>'error',
                'error' => $valid->errors()->toArray(),
            ]);
        }else{

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = bcrypt($request->password);
                
            // if ($request->file('image')) {
            //     $imagePath = $request->file('file');
            //     $imageName = $imagePath->getClientOriginalName();
    
            //     $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
            // }
            // $user->image = '/storage/'+$path+''+$imageName;
            
            $user->save();
        
        $user->syncRoles($request->roles);

        return response()->json(['status'=>'success', 'msg'=>'User Created Successfully.']);
        
        }
        
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
    public function edit(User $user)
    {
        $role = Role::get();
        $user->roles;
       return view('user_and_roles.user.edit',['user'=>$user,'roles' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $valid = Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.$user->id.',id',
            'phone_number'=>'max:20|unique:users',
            'password'=>'required|confirmed'
        ]);

        if($valid->failed()){
            return redirect()->back()->withSuccess('User not updated!');
        }else{
            $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'password'=> bcrypt($request->password),
            ]); 

            $user->syncRoles($request->roles);

            return redirect()->back()->withSuccess('User updated Successfully!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->withSuccess('User deleted Successfully!');
    }
}
