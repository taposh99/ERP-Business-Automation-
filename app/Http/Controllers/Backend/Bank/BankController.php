<?php

namespace App\Http\Controllers\Backend\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank\Bank;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks= Bank::latest()->get();
        return view('bank.bank.table',['banks'=>$banks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.bank.add');
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
            'bank_name'=>'required',
            'short_name' => 'required',
        ]);
        
        Bank::create([
            'name'=>$request->bank_name,
            'short_name'=>$request->short_name,
        ]);
        return redirect()->route('banks.index')->withSuccess('Bank Created Successfully!');
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
    public function edit(Bank $bank)
    {
        $role = Role::get();
       return view('bank.bank.edit',['bank'=>$bank,'roles' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Bank $bank)
    {

        $request->validate([
            'bank_name'=>'required',
            'short_name' => 'required',
        ]);

        $bank->update([
            'name' => $request->bank_name,
            'short_name' => $request->short_name
        ]);
        return redirect()->route('banks.index')->withSuccess('Bank updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->back()->withSuccess('Bank Deleted Successfully');
    }
}
