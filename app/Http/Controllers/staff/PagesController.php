<?php

namespace App\Http\Controllers\staff;

use App\Models\Product;
use App\Models\StockLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function addStock(Request $request, string $id)
    {
        $request->validate([
            'added_stock' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);

        StockLog::create([
            'product_id' => $product->id,
            'previous_stock' => $product->stock,
            'added_stock' => $request->added_stock,
            'new_stock' => $product->stock + $request->added_stock,
        ]);

        $product->stock += $request->added_stock;
        $product->save();

        return redirect()->route('inventory.index')->with('success', 'Stock added successfully and logged!');
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


    public function showStocks ($id)
    {
        $product = Product::findOrFail($id);

    
        $logs = StockLog::where('product_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('pages.stock-logs', [
            'product' => $product,
            'logs' => $logs,
        ]);
    
    }
}
