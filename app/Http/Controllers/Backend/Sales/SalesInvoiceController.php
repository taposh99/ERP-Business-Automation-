<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class SalesInvoiceController extends Controller
{
    public function SalesInvoice()
    {
        return view('sales.salesinvoice.salesinvoice_table');
    }

    public function salesInvoiceCreate()
    {
        $products = Product::with('stock')->get();
        return view('sales.salesinvoice.sales-invoice-create',compact('products'));
    }
}
