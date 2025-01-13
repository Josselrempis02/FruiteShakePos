<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\staff\PosController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\SalesReportController;
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
    

    Route::resource('products', ProductsController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('staff', StaffController::class);

    Route::post('/cart/store', [PosController::class, 'store'])->name('cart.store');
    Route::post('/cart/update', [PosController::class, 'update'])->name('cart.update');
    Route::post('/cart/discount', [PosController::class, 'applyDiscount'])->name('cart.applyDiscount');
    Route::post('/place-order', [PosController::class, 'placeOrder'])->name('place.order');

    Route::get('/receipts', [ReceiptController::class, 'showReceipt'])->name('receipts.index');
    Route::get('/orders/{id}/receipt', [ReceiptController::class, 'downloadReceipt'])->name('orders.receipt');

    Route::get('/sales-report', [SalesReportController::class, 'index'])->name('sales-report.index');
    Route::post('/sales-report/generate', [SalesReportController::class, 'generate'])->name('sales-report.generate');
    Route::get('/sales-report/download', [SalesReportController::class, 'download'])->name('sales-report.download');









});