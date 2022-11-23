<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service\ServiceCreate;
use App\Models\Service\ServiceList;
use Validator;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function CustomerReceivedCreate()
    {
        return view('Service.Service-received-create.Service-received-add',[

            'servecesInvoice' => count( ServiceCreate::all()),
        ]);
    }
    public function CustomerReceivedstore(Request $request)
    {
        //        dd($request);

        $this->validate($request, [
            'cname' => 'required',
            'invoice_no' => 'unique:service_creates,invoice_no',
            'cphone' => 'required',
            'p_name' => 'nullable',
            'p_code' => 'nullable',
            'caddress' => 'nullable',
            'pdescription' => 'nullable',
        ]);

        $servicestore = new ServiceCreate();
        $servicestore->cname = $request->cname;
        $servicestore->deli_date = $request->deli_date;
        $servicestore->invoice_no = $request->invoice_no;
        $servicestore->cphone = $request->cphone;
        $servicestore->p_name = $request->p_name;
        $servicestore->p_code = $request->p_code;
        $servicestore->caddress = $request->caddress;
        $servicestore->pdescription = $request->pdescription;
        $servicestore->save();

        return redirect()->route('service-received-show')->with('message', 'Service Create Successfully');
    }
    public function CustomerReceivedshow()
    {
        return view('service.service-received-list.service-received-show', [
            'servicestore' => ServiceCreate::all()
        ]);
    }
    public function CustomerReceivedEdit($id)
    {
        return view('service.service-received-list.service-received-edit', [
            'servicestore' => ServiceCreate::find($id),
        ]);
    }
    public function CustomerReceivedUpdate(Request $request, $id)
    {
        $servicestore = ServiceCreate::find($id);
        $servicestore->update([
            'cname' => $request->cname,
            'cphone' => $request->cphone,
            'p_name' => $request->p_name,
            'p_code' => $request->p_code,
            'pdescription' => $request->pdescription,

        ]);
        return redirect()->route('service-received-show')->with('message', 'Update Successfully');
    }
    public function CustomerReceivedDelete(Request $request)
    {
        $servicestore = ServiceCreate::find($request->servicestoredelete_id);
        $servicestore->delete();
        return back()->with('message', 'Deleted Successfully');
    }
    public function serviceListShow()
    {
        return view('service.service-list.service-list', [
            'liststores' => ServiceList::all()
        ]);
    }
    public function serviceListStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'description' => 'nullable',

        ]);;
        $liststores = new ServiceList();
        $liststores->name = $request->name;
        $liststores->category = $request->category;
        $liststores->cost = $request->cost;
        $liststores->price = $request->price;
        $liststores->description = $request->description;
        $liststores->save();

        return redirect()->route('service-list-show')->with('message', 'Create Successfully');
    }
    public function serviceListEdit($id)
    {
        return view('service.service-list.service-edit', [
            'liststores' => ServiceList::find($id),
        ]);
    }
    public function serviceListUpdate(Request $request, $id)
    {

        $liststores = ServiceList::find($id);
        $liststores->update([
            'name' => $request->name,
            'category' => $request->category,
            'cost' => $request->cost,
            'price' => $request->price,
            'description' => $request->description,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function serviceListDelete(Request $request)
    {
        $liststores = ServiceList::find($request->liststore_id);
        $liststores->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}
