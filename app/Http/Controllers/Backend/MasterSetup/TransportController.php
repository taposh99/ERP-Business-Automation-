<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function manageTransport()
    {
        $transports = Transport::all()->sortByDesc('id')->values();
        return view('master-setup.transport.table', compact('transports'));
    }

    public function storeTransport(Request $request)
    {
        $request->validate([
            'sort' => 'required',
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        Transport::create([
            'sort' => $request->sort,
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);
        return redirect()->route('admin.manage.transport')->with('message', 'Transport Added Successfully');
    }
    public function editTransport($id)
    {
        $transport = Transport::find($id);
        return view('master-setup.transport.edit', compact('transport'));
    }
    public function updateTransport(Request $request, $id)
    {
        $transport = Transport::find($id);
        $transport->update([
            'sort' => $request->sort,
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);
        return redirect()->route('admin.manage.transport')->with('message', 'Transport Updated');
    }

    public function deleteTransport($id)
    {
        $transport = Transport::find($id);
        $transport->delete();
        return redirect()->route('admin.manage.transport')->with('error', 'Transport deleted');
    }
}
