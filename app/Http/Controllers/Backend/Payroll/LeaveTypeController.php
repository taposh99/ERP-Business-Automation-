<?php

namespace App\Http\Controllers\Backend\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_type= LeaveType::latest()->get();
        return view('payroll.leave_type.table',['leave_types'=>$leave_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payroll.leave_type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'days'=>'required',
            'status'=>'required',
            'description' => 'nullable',
        ]);
        
        LeaveType::create([
            'name'=>$request->name,
            'days'=>$request->days,
            'status'=>$request->status,
            'description'=>$request->description,
        ]);
        return redirect()->route('leavetypes.index')->withSuccess('LeaveType Created Successfully!');
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
    public function edit( $id)
    {
        $leave_type = LeaveType::where('id','=', $id)->first();
        
       return view('payroll.leave_type.edit',['leave_type'=>$leave_type,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $leave_type = LeaveType::where('id','=', $id)->first();

        $request->validate([
            'name'=>'required',
            'days'=>'required',
            'status'=>'required',
            'description' => 'nullable',
        ]);
        
        $leave_type->update([
            'name'=>$request->name,
            'days'=>$request->days,
            'status'=>$request->status,
            'description'=>$request->description,
        ]);
        return redirect()->route('leavetypes.index')->withSuccess('LeaveType updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $leave_type = LeaveType::where('id','=', $id)->first();
        $leave_type->delete();

        return redirect()->back()->withSuccess('LeaveType Deleted Successfully');
    }
}
