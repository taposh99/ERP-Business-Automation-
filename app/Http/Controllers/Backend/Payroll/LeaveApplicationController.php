<?php

namespace App\Http\Controllers\Backend\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\Employee;
use App\Models\Payroll\LeaveApplication;
use App\Models\Payroll\LeaveType;
use Illuminate\Http\Request;

class LeaveApplicationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_application= LeaveApplication::with(['employee', 'leave_type'])->latest()->get();
        return view('payroll.leave_application.table',['leave_applications'=>$leave_application]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $employees = Employee::get();
        $leave_types = LeaveType::get();
        return view('payroll.leave_application.add',['employees' => $employees, 'leave_types' => $leave_types]);
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
            'employee_id'=>'required',
            'leave_types_id'=>'required',
            'apply_date'=>'required',
            'leave_form' => 'required',
            'leave_to'=>'required',
            'status'=>'required',
            'reason'=>'required',
            'note'=>'nullable',
        ]);
        
        LeaveApplication::create($request->all());
        return redirect()->route('leave-application.index')->withSuccess('LeaveApplication Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $leave_application = LeaveApplication::where('id','=', $id)->first();
        $employees = Employee::get();
        $leave_types = LeaveType::get();
       return view('payroll.leave_application.edit',['leave_application'=>$leave_application, 'employees' => $employees, 'leave_types' => $leave_types]);
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

        $leave_application = LeaveApplication::where('id','=', $id)->first();

        $request->validate([
            'employee_id'=>'required',
            'leave_types_id'=>'required',
            'apply_date'=>'required',
            'leave_form' => 'required',
            'leave_to'=>'required',
            'status'=>'required',
            'reason'=>'required',
            'note'=>'nullable',
        ]);
                
        $leave_application->update( $request->all());
        return redirect()->route('leave-application.index')->withSuccess('Leave Record updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $leave_application = LeaveApplication::where('id','=', $id)->first();
        $leave_application->delete();

        return redirect()->back()->withSuccess('LeaveApplication Deleted Successfully');
    }
}
