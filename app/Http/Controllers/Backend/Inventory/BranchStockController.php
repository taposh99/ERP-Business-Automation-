<?php

namespace App\Http\Controllers\Backend\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Branch;
use App\Models\Inventory\Warehouse;
use App\Models\ProductSetup\Stock;
use Illuminate\Http\Request;

class BranchStockController extends Controller
{

    public function index()
    {
        // take all branch from barnch table
        $branches = Branch::with('warehouse')->get();
        // then stock table find total stock 
        foreach ($branches as $branch) {
            $branch->total_stock_product = Stock::where('branch_id', $branch->id)->sum('total_qty');
        }
        return view('inventory.branch_stock_table', compact('branches'));
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
