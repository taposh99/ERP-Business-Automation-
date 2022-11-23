<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function barcodeIndex()
    {
        $productCode = rand(1,30);

        return view('barcode',[
            'productCode' => $productCode
        ]);
    }
}
