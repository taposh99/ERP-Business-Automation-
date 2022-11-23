<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function SalesEstimate()
    {
        return view('sales.salesestimate.sales_table');
    }

    public function salesEstimateCreate()
    {
        $products = Product::with('stock')->get();
        return view('sales.salesestimate.sales-estimate-create',compact('products'));
    }
    public function view()
    {
        $previewDeliveries = session()->get('salesCreate');
        return view('sales.salesestimate.view',compact('previewDeliveries'));
    }

    public function addProduct($id)
    {
        // dd('here');
        $product = Product::with('stock')->find($id);
        if (!$product) {
            return back()->with('message', 'No product available');
        } else {
            $salesCreateExist = session()->get('salesCreate');
            if (!$salesCreateExist) {
                // case-1: first time adding
                $salesCreate = [$id => [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'qty' => 1,
                ]];
                session()->put('salesCreate', $salesCreate);
                return redirect()->route('sales-estimate-create')->with('message', 'product added');
            }

            if (!isset($salesCreateExist[$id])) {

                // case-2: different product adding
                $salesCreateExist[$id] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'qty' => 1,
                ];
                session()->put('salesCreate', $salesCreateExist);
                return redirect()->route('sales-estimate-create')->with('message', 'another product added');
            }
            // case-3: same product adding into the cart
            $salesCreateExist[$id]['qty'] = $salesCreateExist[$id]['qty'] + 1;
            session()->put('salesCreate', $salesCreateExist);
            return redirect()->route('sales-estimate-create')->with('message', 'Same product added');
        }
    }

    public function clear()
    {
        session()->forget('salesCreate');
        return redirect()->route('sales-estimate-create')->with('error', 'Transfer Cleared');
    }
    public function destroy()
    {
        dd('delete');
        return redirect()->route('sales-estimate-create')->with('error', 'Branch Transfer Cleared');
    }
}
