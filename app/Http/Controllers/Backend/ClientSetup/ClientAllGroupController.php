<?php

namespace App\Http\Controllers\Backend\ClientSetup;

use App\Http\Controllers\Controller;
use App\Models\ClientGroup;
use Illuminate\Http\Request;

class ClientAllGroupController extends Controller
{
    public function index()
    {
        // dd('here');
        $groups = ClientGroup::all()->sortByDesc('id')->values();
        return view('client_setup.group.table', compact('groups'));
    }

    
    public function create()
    {
        dd('here');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:client_groups',
            'description' => 'required',
        ]);

        ClientGroup::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return back()->with('message', 'Group Added Successfully');
    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $group = ClientGroup::find($id);
        return view('client_setup.group.edit', compact('group'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:client_groups',
            'description' => 'required',
        ]);
        $group = ClientGroup::find($id);
        $group->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return back()->with('message', 'group Updated');
    }

    public function destroy($id)
    {
        $group = ClientGroup::find($id);
        $group->delete();
        return back()->with('error', 'group deleted');
    }
}
