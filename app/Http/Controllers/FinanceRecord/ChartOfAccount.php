<?php

namespace App\Http\Controllers\FinanceRecord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartOfAccount extends Controller
{
    public function chartAccount()
    {
        return view('finance_record.index');
    
    }

    public function profitLoss()
    {
        return view('finance_record.frofit_loss');
    
    }
    public function trialBalance()
    {
        return view('finance_record.trial_balance');
    
    }
    public function balanceSheet()
    {
        return view('finance_record.balance_sheet');
    
    }
    public function financeAnalysis()
    {
        return view('finance_record.finance_analysis');
    
    }


}
