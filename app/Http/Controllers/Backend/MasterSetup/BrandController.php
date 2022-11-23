<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function manageBrand()
    {
        $brands = Brand::all()->sortByDesc('id')->values();
        return view('master-setup.brand.table', compact('brands'));
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.brand')->with('message', 'Brand Added Successfully');
    }
    public function editBrand($id)
    {
        $brand = Brand::find($id);
        return view('master-setup.brand.edit', compact('brand'));
    }
    public function updateBrand(Request $request, $id)
    {
        $brand = Brand::find($id);
        $brand->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.brand')->with('message', 'Brand Updated');
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('admin.manage.brand')->with('error', 'brand deleted');
    }
}
