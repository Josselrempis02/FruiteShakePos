<?php

namespace App\Http\Controllers\staff;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function showInv ()
    {
        return view('pages.inventory');
    }

    public function showStaff ()
    {
        return view('pages.staff');
    }

    public function showReport ()
    {
        return view('pages.report');
    }

    public function showReceipts ()
    {
        return view('pages.receipts');
    }


    // public function showProd ()
    // {
    //     $products = Product::paginate(10);
    //     return view('pages.product', compact('products'));
    // }
}
