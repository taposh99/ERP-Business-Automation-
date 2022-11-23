<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function manageManufacturer()
    {
        $manufacturers = Manufacturer::all()->sortByDesc('id')->values();
        return view('master-setup.manufacturer.table', compact('manufacturers'));
    }

    public function storeManufacturer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'm_product' => 'required',
        ]);

        Manufacturer::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
            'm_product' => $request->m_product,
        ]);
        return redirect()->route('admin.manage.manufacturer')->with('message', 'Manufacturer Added Successfully');
    }
    public function editManufacturer($id)
    {
        $manufacturer = Manufacturer::find($id);
        return view('master-setup.manufacturer.edit', compact('manufacturer'));
    }
    public function updateManufacturer(Request $request, $id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
            'm_product' => $request->m_product,
        ]);
        return redirect()->route('admin.manage.manufacturer')->with('message', 'Manufacturer Updated');
    }

    public function deleteManufacturer($id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect()->route('admin.manage.manufacturer')->with('error', 'Manufacturer deleted');
    }
}
