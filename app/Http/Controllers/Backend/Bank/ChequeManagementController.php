<?php

namespace App\Http\Controllers\Backend\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank\Bank;
use App\Models\Bank\BankAccounts;
use App\Models\Bank\ChequeManagement;
use Illuminate\Http\Request;

class ChequeManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $received_cheques= ChequeManagement::where('type', '=', 'received')->latest()->get();
        $given_cheques= ChequeManagement::where('type', '=', 'given')->latest()->get();
        $deposit_cheques= ChequeManagement::where('type', '=', 'deposit')->latest()->get();
        $payment_cheques= ChequeManagement::where('type', '=', 'payment')->latest()->get();
        $return_cheques= ChequeManagement::where('type', '=', 'return')->latest()->get();
        $banks = Bank::latest()->get();
        
        return view('bank.cheque_management.table',['received_cheques'=>$received_cheques, 'given_cheques'=>$given_cheques, 'deposit_cheques'=>$deposit_cheques,'payment_cheques'=>$payment_cheques, 'return_cheques'=> $return_cheques, 'banks'=>$banks,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = ChequeManagement::get();
        return view('bank.cheque_management.add',['banks' => $banks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        
        ChequeManagement::create($request->all());
       
        
        return redirect()->route('manage-cheque.index')->withSuccess('Cheque Created Successfully!');
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
        $cheque= ChequeManagement::where('id','=', $id)->first();
        return view('bank.cheque_management.edit',[ 'cheque' => $cheque]);
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
        $cheque= ChequeManagement::where('id','=', $id)->first();
        $cheque->update($request->all());
       
        
        return redirect()->route('manage-cheque.index')->withSuccess('Cheque Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cheque= ChequeManagement::where('id','=', $id)->first();
        $cheque->delete();

        return redirect()->back()->withSuccess('Cheque Deleted Successfully');
    }
}
