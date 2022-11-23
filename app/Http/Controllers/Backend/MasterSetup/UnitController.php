<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function manageUnit()
    {
        $units = Unit::all()->sortByDesc('id')->values();
        return view('master-setup.unit.table', compact('units'));
    }

    public function storeUnit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Unit::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.unit')->with('message', 'Unit Added Successfully');
    }
    public function editUnit($id)
    {
        $unit = Unit::find($id);
        return view('master-setup.unit.edit', compact('unit'));
    }
    public function updateUnit(Request $request, $id)
    {
        $unit = Unit::find($id);
        $unit->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.unit')->with('message', 'Unit Updated');
    }

    public function deleteUnit($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return redirect()->route('admin.manage.unit')->with('error', 'Unit deleted');
    }
}
