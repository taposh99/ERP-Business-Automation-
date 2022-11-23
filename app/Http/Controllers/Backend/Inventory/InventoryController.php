<?php

namespace App\Http\Controllers\Backend\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory\Branch;
use App\Models\Inventory\Warehouse;

class InventoryController extends Controller
{
    //////////////// branch ////////////////
    public function branchTable()
    {
        $branches = Branch::with('warehouse')->get();
        return view('inventory.branch_table', compact('branches'));
    }

    public function addBranch(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Branch::create([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return back()->with('message', 'Branch added successfully');
    }

    public function editBranch($id)
    {
        $branch = Branch::find($id);
        return view('inventory.edit_branch', compact('branch'));
    }


    public function updateBranch(Request $request, $id)
    {
        $branch = Branch::find($id);
        $branch->update([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('inventory.branch.table')->with('message', 'Branch updated successfully');
    }

    public function destroyBranch($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return back()->with('error', 'Branch deleted');
    }

    ////////////////// warehouse ////////////////
    public function warehouseTable()
    {
        $branches = Branch::with('warehouse')->get();
        $warehouses = Warehouse::with('branch')->get();
        return view('inventory.warehouse_table', compact('branches','warehouses'));
    }

    public function addWarehouse(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'branch_id' => 'nullable',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Warehouse::create([
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return back()->with('message', 'Warehouse added successfully');
    }

    public function editWarehouse($id)
    {
        $warehouse = Warehouse::find($id);
        return view('inventory.edit_warehouse', compact('warehouse'));
    }

    public function updateWarehouse(Request $request, $id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->update([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('inventory.warehouse.table')->with('message', 'Warehouse updated successfully');
    }

    public function destroyWarehouse($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();
        return back()->with('error', 'warehouse deleted');
    }
}
