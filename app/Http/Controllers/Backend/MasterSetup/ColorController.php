<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function manageColor()
    {
        $colors = Color::all()->sortByDesc('id')->values();
        return view('master-setup.color.table', compact('colors'));
    }

    public function storeColor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color_code' => 'required',
        ]);
        
        Color::create([
            'name' => $request->name,
            'color_code' => $request->color_code,
        ]);
        return redirect()->route('admin.manage.color')->with('message', 'Color Added Successfully');
    }
    public function editColor($id)
    {
        $color = Color::find($id);
        return view('master-setup.color.edit', compact('color'));
    }
    public function updateColor(Request $request, $id)
    {
        $color = Color::find($id);
        $color->update([
            'name' => $request->name,
            'color_code' => $request->color_code,
        ]);
        return redirect()->route('admin.manage.color')->with('message', 'Color Updated');
    }

    public function deleteColor($id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->route('admin.manage.color')->with('error', 'Color deleted');
    }
}
