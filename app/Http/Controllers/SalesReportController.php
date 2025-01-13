<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    public function index()
    {
        return view('sales-report.index');
    }

    public function generate(Request $request)
{
    // Parse the start and end dates using Carbon
    $startDate = Carbon::parse($request->start_date)->startOfDay();
    $endDate = Carbon::parse($request->end_date)->endOfDay();
    
    // Fetch orders within the date range
    $orders = Order::whereBetween('created_at', [$startDate, $endDate])
        ->with('items')
        ->get();
    
    // Aggregate sales data by date
    $salesData = $orders->groupBy(function ($order) {
        return $order->created_at->format('Y-m-d');  // Group by date
    })->map(function ($ordersPerDay) {
        // Sum total sales for the grouped orders
        $totalSales = $ordersPerDay->sum('total');
        return (object)[
            'date' => $ordersPerDay->first()->created_at->format('Y-m-d'),
            'total_sales' => $totalSales,
        ];
    });
    
    return view('pages.report', [
        'sales' => $salesData,
        'start_date' => $startDate->toDateString(),
        'end_date' => $endDate->toDateString(),
    ]);
}

    
    
    public function download(Request $request)
    {
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();
    

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])
            ->with('items')
            ->get();

        $salesData = $orders->map(function ($order) {
            return [
                'date' => $order->created_at->format('Y-m-d'),
                'product' => $order->items->pluck('product_name')->implode(', '),
                'quantity' => $order->items->sum('quantity'),
                'total_sales' => $order->total,
            ];
        });

        $pdf = PDF::loadView('pdf.sales-report', ['salesData' => $salesData]);

        return $pdf->download('sales-report.pdf');
    }
}
