<?php

namespace App\Http\Controllers\auth;

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

    

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function superadminDashboard()
    {
        return view('superadmin.dashboard');
    }

    public function staffDashboard()
    {
        return view('staff.dashboard');
    }
}
