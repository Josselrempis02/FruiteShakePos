<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\loginController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', [App\Http\Controllers\auth\loginController::class, 'login'])->name('login');

Route::group(['prefix' => 'superadmin', 'middleware' => ['role:superadmin']], function () {
    Route::get('/dashboard', [loginController::class, 'superadminDashboard'])->name('superadmin.dashboard');


});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [loginController::class, 'adminDashboard'])->name('admin.dashboard');

    
});

Route::group(['prefix' => 'staff', 'middleware' => ['role:staff']], function () {
    Route::get('/dashboard', [loginController::class, 'staffDashboard'])->name('staff.dashboard');


});