<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Warranty\ManageProduct;
use App\Models\Warranty\ServiceOffice;
use App\Models\Warranty\ClaimSupplier;
use App\Models\Warranty\WarrantyDeliver;
use App\Models\Warranty\WarrantyStock;
use App\Models\Warranty\WarrantyDetails;
use Validator;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    //service center
    public function serviceCenterShow()
    {
        return view('warranty-management.service-center-show', [
            'servicecenter' => ServiceOffice::all()
        ]);
    }

    public function serviceCenterStore(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'description' => 'nullable',

        ]);
        $servicecenter = new ServiceOffice();
        $servicecenter->name = $request->name;
        $servicecenter->contact = $request->contact;
        $servicecenter->address = $request->address;
        $servicecenter->description = $request->description;
        $servicecenter->save();

        return back()->with('message', 'Create Successfully');
    }
    public function serviceCenterEdit($id)
    {
        return view('warranty-management.service-center-edit', [
            'serviceCenterEdit' => ServiceOffice::find($id),
        ]);
    }
    public function serviceCenterUpdate(Request $request, $id)
    {

        $serviceCenteredit = ServiceOffice::find($id);
        $serviceCenteredit->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
            'description' => $request->description,


        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function serviceCenterDelete(Request $request)
    {
        $serviceCenterdelete = ServiceOffice::find($request->service_delete_id);
        $serviceCenterdelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }


    //warranty
    public function warrantyShow()
    {
        return view('warranty-management.warranty-claim-show', [
            'warrantyStore' => WarrantyDetails::all()
        ]);
    }


    public function warrantyStore(Request $request)
    {



        $this->validate($request, [
            'name' => 'required',
            'contact' => 'required',
            'product' => 'required',
            's_date' => 'required',
            'w_date' => 'required',


        ]);

        $warrantyStore = new WarrantyDetails();

        $warrantyStore->name = $request->name;
        $warrantyStore->contact = $request->contact;
        $warrantyStore->product = $request->product;
        $warrantyStore->s_date = $request->s_date;
        $warrantyStore->w_date = $request->w_date;

        $warrantyStore->save();

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function warrantyShowEdit($id)
    {
        return view('warranty-management.warranty-show-edit', [
            'warrantyshowedit' => WarrantyDetails::find($id),
        ]);
    }
    public function warrantyShowUpdate(Request $request, $id)
    {

        $warrantyshowedit = WarrantyDetails::find($id);
        $warrantyshowedit->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'product' => $request->product,
            's_date' => $request->s_date,
            'w_date' => $request->w_date,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function warrantyShowDelete(Request $request)
    {
        $warrantyshowedelete = WarrantyDetails::find($request->warranty_delete);
        $warrantyshowedelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }
    //Claim Supplier
    public function ClaimSupplierShow()
    {
        return view('warranty-management.claim-supplier-show', [
            'claimsupplier' => ClaimSupplier::all()
        ]);
    }
    public function ClaimSupplierStore(Request $request)
    {

        // $request->validate([

        //     'image' => 'nullable',
        //     'note' => 'nullable',
        // ]);
        // dd($request->all());

        $filename = '';
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/claim-supplier'), $filename);
        }
        // dd($filename);

        ClaimSupplier::create([
            'image' => $filename,
            'product' => $request->product,
            'code' => $request->code,
            'serial' => $request->serial,
            'note' => $request->note,
        ]);
        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function ClaimSupplierEdit($id)
    {
        return view('warranty-management.claim-supplier-edit', [
            'claimsupplieredit' => ClaimSupplier::find($id),
        ]);
    }
    public function ClaimSupplierUpdate(Request $request, $id)
    {

        $claimsupplierupdate = ClaimSupplier::find($id);
        $claimsupplierupdate->update([
            'image' => $request->image,
            'product' => $request->product,
            'code' => $request->code,
            'serial' => $request->serial,
            'note' => $request->note,


        ]);


        return back()->with('message', 'Update Successfully');
    }
    public function ClaimSupplierDelete(Request $request)
    {
        $claimsupplier = ClaimSupplier::find($request->claim_supplier_delete);
        $claimsupplier->delete();

        return back()->with('message', 'Deleted Successfully');

//        {
//            $claimsuppliers = ClaimSupplier::find($id);
//            $image = str_replace('\\', '/', public_path('claim-supplier/' . $claimsuppliers->image));
//            if (is_file($image)) {
//                unlink($image);
//                $claimsuppliers->delete();
//                return redirect()->route('claim-supplier-delete')->with('error', 'Product deleted');
//            } else {
//                $claimsuppliers->delete();
//                return redirect()->back()->with('error', 'image not found! product deleted');
//            }
//        }
    }

    //warranty
    public function WarrantyStockShow()
    {
        return view('warranty-management.warranty-stock-show',[
            'WarrantyStock' => WarrantyStock::all()
        ]);
    }
    public function warrantyStockStore(Request $request)
    {
        WarrantyStock::create([
            'product' => $request->product,
            'sku' => $request->sku,
            'in' => $request->in,
            'out' => $request->out,
            'available' => $request->available,
        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function warrantyStockEdit($id)
    {
        return view('warranty-management.warranty-stock-edit', [
            'WarrantyStockEdit' => WarrantyStock::find($id),
        ]);
    }
    public function warrantyStockUpdate(Request $request, $id)
    {

        $warrantyshowUpdate = WarrantyStock::find($id);
        $warrantyshowUpdate->update([
            'product' => $request->product,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function warrantyStockDelete(Request $request)
    {
        $warrantystockdelete = WarrantyStock::find($request->warranty_stock_delete);
        $warrantystockdelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }

    //manage product
    public function manageProductShow()
    {
        return view('warranty-management.manage-product-show',[
            'ManageProduct' => ManageProduct::all()
        ]);
    }
    public function manageProductStore(Request $request)
    {
        ManageProduct::create([
            'date' => $request->date,
            'product' => $request->product,
            'serial' => $request->serial,
            'note' => $request->note,

        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function manageProductEdit($id)
    {
        return view('warranty-management.manage-product-edit', [
            'ManageProduct' => ManageProduct::find($id),
        ]);
    }
    public function manageProductUpdate(Request $request, $id)
    {

        $ManageProduct = ManageProduct::find($id);
        $ManageProduct->update([
            'date' => $request->date,
            'product' => $request->product,
            'serial' => $request->serial,
            'note' => $request->note,

        ]);
        return back()->with('message', 'Update Successfully');
    }

    public function manageProductDelete(Request $request)
    {
        $ManageProduct = ManageProduct::find($request->manage_product_delete);
        $ManageProduct->delete();
        return back()->with('message', 'Deleted Successfully');
    }
    //Warranty Delivered
    public function warrantyDeliveredShow()
    {
        return view('warranty-management.warranty-delivered-show',[
            'WarrantyDeliver' => WarrantyDeliver::all()
        ]);
    }
    public function warrantyDeliveredStore (Request $request)
    {
        WarrantyDeliver::create([
            'date' => $request->date,
            'contact' => $request->contact,
            'product' => $request->product,
            'serial' => $request->serial,
            'note' => $request->note,

        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function warrantyDeliveredEdit($id)
    {
        return view('warranty-management.warranty-delivered-edit', [
            'WarrantyDeliver' => WarrantyDeliver::find($id),
        ]);
    }
    public function warrantyDeliveredUpdate(Request $request, $id)
    {

        $WarrantyDeliver = WarrantyDeliver::find($id);
        $WarrantyDeliver->update([
            'date' => $request->date,
            'contact' => $request->contact,
            'product' => $request->product,
            'serial' => $request->serial,
            'note' => $request->note,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function warrantyDeliveredDelete(Request $request)
    {
        $WarrantyDeliver = WarrantyDeliver::find($request->warranty_delivered_delete);
        $WarrantyDeliver->delete();
        return back()->with('message', 'Deleted Successfully');
    }

}
