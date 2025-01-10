<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InventoryController;
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

    Route::post('/inventory/{id}/add-stock', [PagesController::class, 'addStock'])->name('inventory.addStock');
    Route::get('/inventory/{id}/stock-logs', [PagesController::class, 'showStocks'])->name('inventory.stockLogs');



  

    
    Route::get('/report', [PagesController::class, 'showReport'])->name('staff.report');

    Route::get('/receipts', [PagesController::class, 'showReceipts'])->name('staff.receipt');
   

   
    Route::resource('products', ProductsController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('staff', StaffController::class);







});