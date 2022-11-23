<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function purchaseOrder()
    {
        return view('purchase.purchaseorder.purchase-order');
    }

    public function purchaseOrderCreate()
    {
        $products = Product::with('stock')->get();
        return view('purchase.purchaseorder.purchase-order-create',compact('products'));
    }
    public function view()
    {
        $previewDeliveries = session()->get('purOrderCreate');
        return view('purchase.purchaseorder.view',compact('previewDeliveries'));
    }

    public function addProduct($id)
    {
        $product = Product::with('stock')->find($id);
        if (!$product) {
            return back()->with('message', 'No product available');
        } else {
            $purOrderCreateExist = session()->get('purOrderCreate');
            if (!$purOrderCreateExist) {
                // case-1: first time adding
                $purOrderCreate = [$id => [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'qty' => 1,
                ]];
                session()->put('purOrderCreate', $purOrderCreate);
                return redirect()->route('admin.purchase-order.create')->with('message', 'product added');
            }

            if (!isset($purOrderCreateExist[$id])) {

                // case-2: different product adding
                $purOrderCreateExist[$id] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'qty' => 1,
                ];
                session()->put('purOrderCreate', $purOrderCreateExist);
                return redirect()->route('admin.purchase-order.create')->with('message', 'another product added');
            }
            // case-3: same product adding into the cart
            $purOrderCreateExist[$id]['qty'] = $purOrderCreateExist[$id]['qty'] + 1;
            session()->put('purOrderCreate', $purOrderCreateExist);
            return redirect()->route('admin.purchase-order.create')->with('message', 'Same product added');
        }
    }

    public function clear()
    {
        session()->forget('purOrderCreate');
        return redirect()->route('admin.purchase-order.create')->with('error', 'Transfer Cleared');
    }
    public function destroy()
    {
        dd('delete');
        return redirect()->route('admin.purchase-order.create')->with('error', 'Branch Transfer Cleared');
    }
}
