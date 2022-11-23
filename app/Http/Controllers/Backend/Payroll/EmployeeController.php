<?php

namespace App\Http\Controllers\Backend\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\Employee;
use Illuminate\Http\Request;
use App\Models\Payroll\Designation;
use App\Models\Payroll\Department;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee= Employee::latest()->get();
        return view('payroll.employee.table',['employee'=>$employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designation= Designation::latest()->get();
        $department= Department::latest()->get();

        return view('payroll.employee.add', ['designation'=> $designation, 'department' => $department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data = new Employee();
       
        if($request->file('profile_image')){
           
            $file= $request->file('profile_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/employee'), $filename);
            $data['profile_image'] = $filename;
        }
        $data['name'] = $request->name;
        $data['father_name'] = $request->father_name;
        $data['mother_name'] = $request->mother_name;
        $data['mobile'] = $request->mobile;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['nid'] = $request->nid;
        $data['dateofbirth'] = $request->dateofbirth;
        $data['joindate'] = $request->joindate;
        $data['salary'] = $request->salary;
        $data['status'] = $request->status;
        $data['gender'] = $request->gender;
        $data['branch'] = $request->branch;
        $data['residensial_address'] = $request->residensial_address;
        $data['parmanent_address'] = $request->parmanent_address;
        $data['designation_id'] = $request->designation_id;
        $data['department_id'] = $request->department_id;
        $data['workplace'] = $request->name;

        $data->save();
        
        return redirect()->route('employee.index')->withSuccess('Employee Created Successfully!');
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
    public function edit(Employee $employee)
    {
        
        $designation= Designation::latest()->get();
        $department= Department::latest()->get();

        return view('payroll.employee.edit', ['designation'=> $designation, 'department' => $department, 'employee' => $employee]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)
    {
        
        if($request->file('profile_image')){
           
            $file= $request->file('profile_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/employee'), $filename);
            $employee['profile_image'] = $filename;
        }
        $employee['name'] = $request->name;
        $employee['father_name'] = $request->father_name;
        $employee['mother_name'] = $request->mother_name;
        $employee['mobile'] = $request->mobile;
        $employee['phone'] = $request->phone;
        $employee['email'] = $request->email;
        $employee['nid'] = $request->nid;
        $employee['dateofbirth'] = $request->dateofbirth;
        $employee['joindate'] = $request->joindate;
        $employee['salary'] = $request->salary;
        $employee['status'] = $request->status;
        $employee['gender'] = $request->gender;
        $employee['branch'] = $request->branch;
        $employee['residensial_address'] = $request->residensial_address;
        $employee['parmanent_address'] = $request->parmanent_address;
        $employee['designation_id'] = $request->designation_id;
        $employee['department_id'] = $request->department_id;
        $employee['workplace'] = $request->name;

        $employee->update();
        
        return redirect()->route('employee.index')->withSuccess('Employee updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->back()->withSuccess('Employee Deleted Successfully');
    }
}
