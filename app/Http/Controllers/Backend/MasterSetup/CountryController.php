<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function manageCountry()
    {
        $countries = Country::all()->sortByDesc('id')->values();
        return view('master-setup.country.table', compact('countries'));
    }

    public function storeCountry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Country::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.country')->with('message', 'Country Added Successfully');
    }
    public function editCountry($id)
    {
        $country = Country::find($id);
        return view('master-setup.country.edit', compact('country'));
    }
    public function updateCountry(Request $request, $id)
    {
        $country = Country::find($id);
        $country->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.country')->with('message', 'Country Updated');
    }

    public function deleteCountry($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('admin.manage.country')->with('error', 'Country deleted');
    }
}
