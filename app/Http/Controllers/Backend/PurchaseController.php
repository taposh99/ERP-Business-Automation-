<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Purchase\PurchaseOrder;
use App\Models\Purchase\PurchaseReturn;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //Purchase Order
    public function purchaseOrderShow(){
        return view('purchase.purchase-order-show',[
            'PurchaseOrder' => PurchaseOrder::all()
        ]);

    }
    public function purchaseOrderStore(Request $request)
    {
        PurchaseOrder::create([
            'date' => $request->date,
            'product' => $request->product,
            'serial' => $request->serial,
            'total' => $request->total,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function purchaseOrderEdit($id)
    {
        return view('purchase.purchase-order-edit',[
            'PurchaseOrderEdit' => PurchaseOrder::find($id),
        ]);
    }
    public function purchaseOrderUpdate(Request $request, $id)
    {

        $PurchaseOrderUpdate = PurchaseOrder::find($id);
        $PurchaseOrderUpdate->update([
            'product' => $request->product,
            'total' => $request->total,
            'note' => $request->note,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function purchaseOrderDelete(Request $request)
    {
        $PurchaseOrderdelete = PurchaseOrder::find($request->purchase_order_delete);
        $PurchaseOrderdelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }
    //Purchase Return
    public function purchaseReturnShow(){
        return view('purchase.purchase-return-show',[
            'PurchaseReturn' => PurchaseReturn::all()
        ]);
    }
    public function purchaseReturnStore(Request $request)
    {
        PurchaseReturn::create([
            'date' => $request->date,
            'vendor' => $request->vendor,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function purchaseReturnEdit($id)
    {
        return view('purchase.purchase-return-edit',[
            'PurchaseReturnEdit' => PurchaseReturn::find($id),
        ]);
    }
    public function purchaseReturnUpdate(Request $request, $id)
    {

        $PurchaseReturnUpdate = PurchaseReturn::find($id);
        $PurchaseReturnUpdate->update([
            'vendor' => $request->vendor,
            'total' => $request->total,
            'note' => $request->note,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function purchaseReturnDelete(Request $request)
    {
        $PurchaseReturndelete = PurchaseReturn::find($request->purchase_return_delete);
        $PurchaseReturndelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}

