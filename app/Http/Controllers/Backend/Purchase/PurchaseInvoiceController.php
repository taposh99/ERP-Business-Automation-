<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class PurchaseInvoiceController extends Controller
{
    public function purchaseInvoice()
    {
        return view('purchase.purchaseinvoice.purchase-invoice');
    }

    public function purchaseInvoiceCreate()
    {
        $products = Product::with('stock')->get();
        return view('purchase.purchaseinvoice.purchase-invoice-create',compact('products'));
    }
}
