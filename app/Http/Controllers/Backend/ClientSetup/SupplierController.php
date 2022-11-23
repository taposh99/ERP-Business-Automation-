<?php

namespace App\Http\Controllers\Backend\ClientSetup;

use App\Http\Controllers\Controller;
use App\Models\ClientGroup;
use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $groups = ClientGroup::with('supplier')->orderBy('id', 'desc')->get();
        $suppliers = User::where('role', 'supplier')->orderBy('id', 'desc')->get();
        return view('client_setup.supplier.table', compact('groups', 'suppliers'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "client_group_id" => "required",
            "name" => "required",
            "status" => "required",
            "father_name" => "required",
            "mother_name" => "required",
            "NID" => "required",
            "contact" => "required",
            "email" => "required",
            "address" => "required",
            "shipping_address" => "required",
            "role" => "required",
        ]);
        // dd($request->all());
        // dd($request->client_group_id);
        User::create([
            "client_group_id" => $request->client_group_id,
            "name" => $request->name,
            "status" => $request->status,
            "father_name" => $request->father_name,
            "mother_name" => $request->mother_name,
            "NID" => $request->NID,
            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
            "shipping_address" => $request->shipping_address,
            "role" => $request->role,
        ]);
        return back()->with('message', 'supplier Added Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $supplier = User::find($id);
        return view('client_setup.supplier.edit', compact('supplier'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "status" => "required",
            "father_name" => "required",
            "mother_name" => "required",
            "NID" => "required",
            "contact" => "required",
            "email" => "required",
            "address" => "required",
            "shipping_address" => "required",
        ]);
        // dd($request->all());
        // dd($request->client_group_id);
        $supplier = User::find($id);
        $supplier->update([
            "name" => $request->name,
            "status" => $request->status,
            "father_name" => $request->father_name,
            "mother_name" => $request->mother_name,
            "NID" => $request->NID,
            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
            "shipping_address" => $request->shipping_address,
        ]);
        return back()->with('message', 'supplier updated');
    }


    public function destroy($id)
    {
        $supplier = User::find($id);
        $supplier->delete();
        return back()->with('error', 'supplier deleted');
    }
}
