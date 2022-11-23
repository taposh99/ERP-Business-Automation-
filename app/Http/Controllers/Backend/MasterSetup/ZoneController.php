<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function manageZone()
    {
        $zones = Zone::all()->sortByDesc('id')->values();
        return view('master-setup.zone.table', compact('zones'));
    }

    public function storeZone(Request $request)
    {
        $request->validate([
            'district' => 'required',
            'zone' => 'required',
        ]);

        Zone::create([
            'district' => $request->district,
            'zone' => $request->zone,
        ]);
        return redirect()->route('admin.manage.zone')->with('message', 'Zone Added Successfully');
    }
    public function editZone($id)
    {
        $zone = Zone::find($id);
        return view('master-setup.zone.edit', compact('zone'));
    }
    public function updateZone(Request $request, $id)
    {
        $zone = Zone::find($id);
        $zone->update([
            'district' => $request->district,
            'zone' => $request->zone,
        ]);
        return redirect()->route('admin.manage.zone')->with('message', 'Zone Updated');
    }

    public function deleteZone($id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        return redirect()->route('admin.manage.zone')->with('error', 'Zone deleted');
    }
}
