<?php

namespace App\Http\Controllers\Backend\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank\Bank;
use App\Models\Bank\BankAccounts;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class MobileAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankaccounts= BankAccounts::where('account_type', '=', 'mobile')->latest()->get();
        $roles = Role::get();
        
        return view('bank.mobile_account.table',['bankaccounts'=>$bankaccounts, 'roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('bank.mobile_account.add',[ 'roles'=> $roles]);
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
            'account_type'  => 'required',
        ]);

        if($request->account_type == 'mobile'){
        
        BankAccounts::create([
            'title'         =>  $request->account_title,
            'account_type'  => $request->account_type,
            'account_no'    =>  $request->account_no,
            'debit'         =>  0,
            'credit'        =>  0,
            'balance'       =>  0,
        ]);
        }
        
        return redirect()->route('mobile-account.index')->withSuccess('Account Created Successfully!');
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
    public function edit($id)
    {
        $bankaccount= BankAccounts::with('bank')->where('id','=', $id)->first();
        $banks = Bank::latest()->get();
        return view('bank.mobile_account.edit',['banks' => $banks, 'bankaccount' => $bankaccount]);
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
            'account_type'  => 'required',
        ]);
        
        if($request->account_type == 'mobile'){
        
            $bankaccount->update([
                'title'         =>  $request->account_title,
                'account_type'  => $request->account_type,
                'account_no'    =>  $request->account_no,
                'debit'         =>  0,
                'credit'        =>  0,
                'balance'       =>  0,
            ]);
            }
        return redirect()->route('mobile-account.index')->withSuccess('Account Updated Successfully!');
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
