<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSellerController;

Route::get('/', function () {
    return redirect()->route('admin');
});
Route::get('/productsapproval', function () {
    return view('productsapproval');
})->name('productsapproval');


Route::get('/admin', function () {
    return view('admin');
})->name('admin');


Route::get('/orders', function () {
    return view('orders');
})->name('orders');

//Seller Routes
Route::get('/admin/sellers', [AdminSellerController::class, 'index'])->name('admin.sellers');
Route::post('/admin/sellers/suspend/{id}', [AdminSellerController::class, 'suspend']);
Route::post('/admin/sellers/ban/{id}', [AdminSellerController::class, 'ban']);
Route::get('/admin/sellers/view/{id}', [AdminSellerController::class, 'view']);
