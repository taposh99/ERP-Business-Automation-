<?php

namespace App\Http\Controllers\Backend\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Warehouse;
use App\Models\ProductSetup\Stock;
use Illuminate\Http\Request;

class WarehouseStockController extends Controller
{
  
    public function index()
    {
        $warehouses = Warehouse::with('branch')->get();
        foreach ($warehouses as $warehouse) {
            $warehouse->total_stock_product = Stock::where('warehouse_id', $warehouse->id)->sum('total_qty');
        }
        return view('inventory.warehouse_stock_table', compact('warehouses'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
