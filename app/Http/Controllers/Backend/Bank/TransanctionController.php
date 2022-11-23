<?php

namespace App\Http\Controllers\Backend\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank\BankAccounts;
use App\Models\Bank\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransanctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('bank_account')->get()->unique('tran_no');
        return view('bank.transaction.table-transaction',['transactions' => $transactions ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   { 
    $bankaccounts = BankAccounts::with('bank')->orderBy('account_no', 'asc')->get();
    $tran_id = 'TRN'.Auth::id().mt_rand(100000, 999999);
        return view('bank.transaction.create-transaction',[ 'bankaccounts'=> $bankaccounts, 'tran_id' => $tran_id]);
    }


    public function get_balance(Request $request)
   { 
    $id = $request->id;
    $bankaccount = BankAccounts::where('id', '=', $id )->first();
    if($bankaccount){
        $balance = $bankaccount->balance;
    }else{
        $balance = 0;
    }
    
    return response()->json($balance);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'tran_id'=>'required|unique:transactions,tran_no',
            'date' => 'required',
            'totalamount'=>'required',
            'note' => 'nullable',

            'source'=>'required|array',
            'payto' => 'required|array',
            'tranamount' => 'required|array',
            'cheque_no' => 'nullable|array',
            'cq_date' => 'nullable|array',
            'trnref' => 'nullable|array',
        ]);

        $i = 0;

        foreach( $request->tranamount as $trnamount ){
            
            Transaction::create([
                'tran_no'    =>  $request->tran_id,
                'date'         =>  $request->date,
                'total_amount'       =>  $request->totalamount,
                'note'        =>  $request->note,
    
                'source'   =>  $request->source[$i],
                'payto'      =>  $request->payto[$i],
                'amount'  =>  $request->tranamount[$i],
                'cheque_no'         =>  $request->cheque_no[$i],
                'cq_date'        =>  $request->cq_date[$i],
                'refference'       =>  $request->trnref[$i],
            ]);
            $i++;
        };
        
        return redirect()->route('transanction.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tran_no)
    {
        $bankaccount= Transaction::with('bank_account')->where('tran_no','=', $tran_no);
        $bankaccount->delete();

        return redirect()->back()->withSuccess('Transaction Deleted Successfully');
    }
}
