<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\Sales\SalesReturn;
use Illuminate\Http\Request;

class SalesReturnController extends Controller
{
    public function salesReturn()
    {
        $salesreturns = SalesReturn::all()->sortByDesc('id')->values();
        return view('sales.salesreturn.sales-return',compact('salesreturns'));
    }
    public function salesReturnCreate(){
        return view('sales.salesreturn.sales-return-create');
    }
    public function storeSalesReturn(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'customer' => 'required',
            'invoice' => 'required',
            'against' => 'required',
            'total' => 'required',
            'note' => 'required',
        ]);
        
        SalesReturn::create([
            'date' => $request->date,
            'customer' => $request->customer,
            'invoice' => $request->invoice,
            'against' => $request->against,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin.sales-return')->with('message', 'SalesReturn Added Successfully');
    }
    public function editSalesReturn($id)
    {
        $salesreturn = SalesReturn::find($id);
        return view('sales.salesreturn.sales-return-edit',compact('salesreturn'));
    }
    public function updateSalesReturn(Request $request, $id)
    {
        $salesreturn = SalesReturn::find($id);
        $salesreturn->update([
            'date' => $request->date,
            'customer' => $request->customer,
            'invoice' => $request->invoice,
            'against' => $request->against,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin.sales-return')->with('message', 'SalesReturn Updated');
    }

    public function deleteSalesReturn($id)
    {
        $salesreturn = SalesReturn::find($id);
        $salesreturn->delete();
        return redirect()->route('admin.sales-return')->with('error', 'SalesReturn deleted');
    }
}
