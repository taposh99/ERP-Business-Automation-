<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase\PurchaseReturn;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    public function purchaseReturn(){
        $purchasereturns = PurchaseReturn::all()->sortByDesc('id')->values();
        return view('purchase.purchasereturn.purchase-return',compact('purchasereturns'));
    }

    public function purchaseReturnCreate(){
        return view('purchase.purchasereturn.purchase-return-create');
    }
    public function storePurchaseReturn(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'vendor' => 'required',
            'invoice' => 'required',
            'against' => 'required',
            'total' => 'required',
            'note' => 'required',
        ]);
        
        PurchaseReturn::create([
            'date' => $request->date,
            'vendor' => $request->vendor,
            'invoice' => $request->invoice,
            'against' => $request->against,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin.purchase-return')->with('message', 'PurchaseReturn Added Successfully');
    }
    public function editPurchaseReturn($id)
    {
        $purchasereturn = PurchaseReturn::find($id);
        return view('purchase.purchasereturn.purchase-return-edit',compact('purchasereturn'));
    }
    public function updatePurchaseReturn(Request $request, $id)
    {
        $purchasereturn = PurchaseReturn::find($id);
        $purchasereturn->update([
            'date' => $request->date,
            'vendor' => $request->vendor,
            'invoice' => $request->invoice,
            'against' => $request->against,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin.purchase-return')->with('message', 'PurchaseReturn Updated');
    }

    public function deletePurchaseReturn($id)
    {
        $purchasereturn = PurchaseReturn::find($id);
        $purchasereturn->delete();
        return redirect()->route('admin.purchase-return')->with('error', 'PurchaseReturn deleted');
    }
}
