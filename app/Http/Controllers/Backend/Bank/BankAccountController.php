<?php

namespace App\Http\Controllers\Backend\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank\Bank;
use App\Models\Bank\BankAccounts;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankaccounts= BankAccounts::with('bank')->where('account_type', '=', 'bank')->latest()->get();
        $banks = Bank::latest()->get();
        $roles = Role::get();
        
        return view('bank.bank_account.table',['bankaccounts'=>$bankaccounts, 'banks'=>$banks, 'roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::get();
        return view('bank.bank_account.add',['banks' => $banks]);
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
            'account_no'=>'required',
            'account_title' => 'required',
            'selected_bank'=>'required',
            'branch_name' => 'required',
            'branch_code'=>'required',
            'branch_location' => 'required',
        ]);
        
        BankAccounts::create([
            'account_no'    =>  $request->account_no,
            'title'         =>  $request->account_title,
            'bank_id'       =>  $request->selected_bank,
            'branch'        =>  $request->branch_name,
            'branch_code'   =>  $request->branch_code,
            'location'      =>  $request->branch_location,
            'account_type'  =>  'bank',
            'debit'         =>  0,
            'credit'        =>  0,
            'balance'       =>  0,
        ]);
        return redirect()->route('bank-account.index')->withSuccess('Account Created Successfully!');
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
        $bankaccount= BankAccounts::with('bank')->where('id','=', $id)->first();
        $banks = Bank::latest()->get();
        $roles = Role::get();
        return view('bank.bank_account.edit',[ 'roles'=> $roles, 'banks' => $banks, 'bankaccount' => $bankaccount]);
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
        $bankaccount= BankAccounts::with('bank')->where('id','=', $id)->first();
        $request->validate([
            'account_no'=>'required',
            'account_title' => 'required',
            'selected_bank'=>'required',
            'branch_name' => 'required',
            'branch_code'=>'required',
            'branch_location' => 'required',
        ]);
        
        $bankaccount->update([
            'account_no'    =>  $request->account_no,
            'title'         =>  $request->account_title,
            'bank_id'       =>  $request->selected_bank,
            'branch'        =>  $request->branch_name,
            'branch_code'   =>  12345,
            'location'      =>  $request->branch_location,
            'debit'         =>  0,
            'credit'        =>  0,
            'balance'       =>  0,
        ]);
        return redirect()->route('bank-account.index')->withSuccess('Account Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankaccount= BankAccounts::with('bank')->where('id','=', $id)->first();
        $bankaccount->delete();

        return redirect()->back()->withSuccess('Account Deleted Successfully');
    }
}
