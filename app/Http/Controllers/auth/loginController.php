<?php

namespace App\Http\Controllers\auth;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
    
            if ($user->role_id == 1) {
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->role_id == 2) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role_id == 3) {
                return redirect()->route('staff.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Invalid role.']);
            }
        } else {
            return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

    // Invalidate the session
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect to the home page
    return redirect('/')->with('success', 'Logged out successfully');

    }

    

    private function getDashboardData()
    {
        $product = Product::all();
        $productCount = $product->count();

        $monthlyRevenue = Order::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total');

        $totalSales = Order::whereDate('created_at', Carbon::today())->sum('total');

        $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total_sales')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = $salesData->pluck('month')->map(function ($month) {
            return Carbon::create()->month($month)->format('F');
        });
        $sales = $salesData->pluck('total_sales');

        return compact('product', 'productCount', 'monthlyRevenue', 'totalSales', 'labels', 'sales');
    }

    public function adminDashboard()
    {
        $dashboardData = $this->getDashboardData();
        return view('dashboard.dashboard', $dashboardData);
    }

    public function superadminDashboard()
    {
        $dashboardData = $this->getDashboardData();
        return view('dashboard.dashboard', $dashboardData);
    }

    public function staffDashboard()
    {
        $dashboardData = $this->getDashboardData();
        return view('dashboard.dashboard', $dashboardData);
    }


    
}
