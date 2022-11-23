<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\make;
use DB;
use Validator;
use Illuminate\Http\Request;
use App\Models\DailyProcess\ExpensestypeModel;
use App\Models\DailyProcess\PriceList;
use App\Models\DailyProcess\Expenseshead;
use App\Models\DailyProcess\Invoice;
use App\Models\ProductSetup\Category;

class DailyProcessController extends Controller
{
    public function PriceList()
    {
        return view('daily_process.price',[
            'PriceList' => PriceList::all()
        ]);
    }
    public function PriceListStore(Request $request)

    {
        PriceList::create([
            'name' => $request->name,
            'code' => $request->code,
            'barcode' => $request->barcode,
            'qty' => $request->qty,
            'o_price' => $request->o_price,
            'c_price' => $request->c_price,
        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function priceListUpdate(Request $request, $id)
    {

        $PriceListUpdate = PriceList::find($id);
        $PriceListUpdate->update([
            'name' => $request->name,
            'c_price' => $request->c_price,

        ]);
        return back()->with('message', 'Update Successfully');
    }

    public function priceListDelete(Request $request)
    {
        $PriceListdelete = PriceList::find($request->price_list_delete);
        $PriceListdelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }

    public function priceListEdit($id)
    {
        return view('daily_process.price-list-edit', [
            'PriceListEdit' => PriceList::find($id),
        ]);
    }
    public function expenseRecord()
    {
        return view('daily_process.expense-record', [
            'invoices' => Invoice::all()
        ]);
    }
    public function expensesHead()
    {
        $expenseshead = DB::table('expensesheads')
            ->join('expensestype_models', 'expensesheads.category_id', 'expensestype_models.id')

            ->select('expensesheads.*', 'expensestype_models.category_name')
            //            ->where('blogs.status',1)
            ->orderby('id', 'desc')
            ->get();
            $categories = Category::with('subCategories')->get();


        return view('daily_process.expenses-head', [
            'categories' => Expenseshead::where('status', 1)->orderby('id', 'desc')->get(),
            // 'categories' => $categories,
            'expensesheads' => $expenseshead

        ]);
    }
    public function AddExpensesHead()
    {    
        $categories = Category::all()->sortByDesc('id')->values();
        return view('daily_process.add-expenses-head',compact('categories'));
    }
    public function addExpensesCategory()
    {
        return view('daily_process.add-expenses-category');
    }

    public function saveCategory(Request $request)
    {
        $category = new ExpensestypeModel();
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back()->with('message', 'Category Add Successfully');
    }
    public function saveExpenses(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);
        
        $expenseshead  = new Expenseshead();
        $expenseshead->name = $request->name;
        $expenseshead->category_id = $request->category_id;
        $expenseshead->description = $request->description;
        $expenseshead->save();
        return back();
    }

    public function deleteExpensesHead(Request $request)
    {
        $expenseshead = Expenseshead::find($request->expenseshead_id);
        $expenseshead->delete();
        return back()->with('message', 'Deleted');
    }
    public function editExpensesHead($id)
    {

        return view('daily_process.edit-expenses-head', [
            'expenseshead' => Expenseshead::find($id),


        ]);
    }
    public function updateExpensesHead(Request $request, $id)
    {

        $expenseshead = Expenseshead::find($id);
        $expenseshead->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);


        return redirect()->back()->with('message', 'Update Successfully');
    }

    public function createExpense()
    {
        return view('daily_process.create-expense', [
            'categories' => Expenseshead::all(),
            'totalInvoices' => count(Invoice::all()),
        ]);
    }

    public function Expense()
    {
        return view('daily_process.expense');
    }
    //Expense Voucher
    public function saveExpenseVoucher(Request $request)
    {

        $this->validate($request, [
            'invno' => 'unique:invoices,invno|required',
            'date' => 'required',
            'totalamount' => 'required',
            'note' => 'nullable',
        ]);

        $invoice = new Invoice();
        $invoice->invno = $request->invno;
        $invoice->date = $request->date;
        $invoice->totalamount = $request->totalamount;
        $invoice->note = $request->note;
        $invoice->save();
        return redirect()->back()->withSuccess('Expense Create Successfully');
    }


    public function editExpenseRecord($id)
    {
        return view('daily_process.edit-expenses-record', [
            'invoice' => Invoice::find($id),


        ]);
    }
    public function updateExpenseRecord(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice->update([
            'invno' => $request->invno,
            'date' => $request->date,
            'totalamount' => $request->totalamount,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('message', 'Update Successfully');
    }
    public function deleteExpenseRecord(Request $request)
    {
        $invoice = Invoice::find($request->invoice_id);
        $invoice->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}
