<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function manageSize()
    {
        $sizes = Size::all()->sortByDesc('id')->values();
        return view('master-setup.size.table', compact('sizes'));
    }

    public function storeSize(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
        ]);

        Size::create([
            'name' => $request->name,
            'size' => $request->size,
        ]);
        return redirect()->route('admin.manage.size')->with('message', 'Size Added Successfully');
    }
    public function editSize($id)
    {
        $size = Size::find($id);
        return view('master-setup.size.edit', compact('size'));
    }
    public function updateSize(Request $request, $id)
    {
        $size = Size::find($id);
        $size->update([
            'name' => $request->name,
            'size' => $request->size,
        ]);
        return redirect()->route('admin.manage.size')->with('message', 'Size Updated');
    }

    public function deleteSize($id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect()->route('admin.manage.size')->with('error', 'Size deleted');
    }
}
