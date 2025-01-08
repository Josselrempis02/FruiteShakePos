<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\staff\PosController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\staff\PagesController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', [loginController::class, 'login'])->name('login');

// Logout route
Route::post('/logout', [loginController::class, 'logout'])->name('logout');



Route::group(['prefix' => 'superadmin', 'middleware' => ['role:superadmin']], function () {
    Route::get('/dashboard', [loginController::class, 'superadminDashboard'])->name('superadmin.dashboard');


});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [loginController::class, 'adminDashboard'])->name('admin.dashboard');

    
});

Route::group(['prefix' => 'staff', 'middleware' => ['role:staff']], function () {
    Route::get('/dashboard', [loginController::class, 'staffDashboard'])->name('staff.dashboard');

    Route::get('/pos', [PosController::class, 'showPos'])->name('staff.pos');
    

    Route::get('/inventory', [PagesController::class, 'showInv'])->name('staff.inv');

    Route::get('/add-staff', [PagesController::class, 'showStaff'])->name('staff.add');
    Route::get('/report', [PagesController::class, 'showReport'])->name('staff.report');

    Route::get('/receipts', [PagesController::class, 'showReceipts'])->name('staff.receipt');
    Route::get('/product', [PagesController::class, 'showProd'])->name('staff.prod');

   
    Route::resource('products', ProductsController::class);






});