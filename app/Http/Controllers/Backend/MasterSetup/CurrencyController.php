<?php

namespace App\Http\Controllers\Backend\MasterSetup;

use App\Http\Controllers\Controller;
use App\Models\MasterSetup\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function manageCurrency()
    {
        $currencys = Currency::all()->sortByDesc('id')->values();
        return view('master-setup.currency.table', compact('currencys'));
    }

    public function storeCurrency(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sort' => 'required',
            'symbol' => 'required',
            'ex_rate' => 'required',
        ]);

        Currency::create([
            'name' => $request->name,
            'sort' => $request->sort,
            'symbol' => $request->symbol,
            'ex_rate' => $request->ex_rate,
        ]);
        return redirect()->route('admin.manage.currency')->with('message', 'Currency Added Successfully');
    }
    public function editCurrency($id)
    {
        $currency = Currency::find($id);
        return view('master-setup.currency.edit', compact('currency'));
    }
    public function updateCurrency(Request $request, $id)
    {
        $currency = Currency::find($id);
        $currency->update([
            'name' => $request->name,
            'sort' => $request->sort,
            'symbol' => $request->symbol,
            'ex_rate' => $request->ex_rate,
        ]);
        return redirect()->route('admin.manage.currency')->with('message', 'Currency Updated');
    }

    public function deleteCurrency($id)
    {
        $currency = Currency::find($id);
        $currency->delete();
        return redirect()->route('admin.manage.currency')->with('error', 'Currency deleted');
    }
}
