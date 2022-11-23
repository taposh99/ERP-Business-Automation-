<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function manageDistrict()
    {
        $districts = District::all()->sortByDesc('id')->values();
        return view('master-setup.district.table', compact('districts'));
    }

    public function storeDistrict(Request $request)
    {
        $request->validate([
            'district' => 'required',
            'country' => 'required',
        ]);

        District::create([
            'district' => $request->district,
            'country' => $request->country,
        ]);
        return redirect()->route('admin.manage.district')->with('message', 'District Added Successfully');
    }
    public function editDistrict($id)
    {
        $district = District::find($id);
        return view('master-setup.district.edit', compact('district'));
    }
    public function updateDistrict(Request $request, $id)
    {
        $district = District::find($id);
        $district->update([
            'district' => $request->district,
            'country' => $request->country,
        ]);
        return redirect()->route('admin.manage.district')->with('message', 'District Updated');
    }

    public function deleteDistrict($id)
    {
        $district = District::find($id);
        $district->delete();
        return redirect()->route('admin.manage.district')->with('error', 'District deleted');
    }
}
