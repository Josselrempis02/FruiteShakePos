<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
