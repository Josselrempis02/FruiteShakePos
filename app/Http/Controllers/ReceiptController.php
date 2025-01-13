<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReceiptController extends Controller
{
    
    public function showReceipt(Request $request)
    {
        $query = $request->input('search');
        $orderList = Order::when($query, function ($q) use ($query) {
            $q->where('customer_name', 'like', '%' . $query . '%');
        })->paginate(10);
        return view('pages.receipts', compact('orderList'));
    }

    public function downloadReceipt($id)
    {
        
        $order = Order::with('items')->findOrFail($id);

        $pdf = Pdf::loadView('receipts.receipt-download', compact('order'));


        return $pdf->download('receipt-' . $order->order_number . '.pdf');
    }
}
   
