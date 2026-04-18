<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminSellerController;

Route::get('/', function () {
    return redirect()->route('admin.sellers');
});
Route::get('/products_approval', function () {
    return view('productsapproval');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/products_approval', function () {
    return view('productsapproval');
});

Route::get('/products_approval', function () {
    return view('productsapproval');
});

Route::get('/orders', function () {
    return view('orders');
});

// Route::get('/admin/products', function () {
//     return view('admin.orders');
// })->name('admin.orders');

// Route::get('/admin/products', function () {
//     return view('admin.reports');
// })->name('admin.reports');

//Seller Routes
Route::get('/admin/sellers', [AdminSellerController::class, 'index'])->name('admin.sellers');
Route::post('/admin/sellers/suspend/{id}', [AdminSellerController::class, 'suspend']);
Route::post('/admin/sellers/ban/{id}', [AdminSellerController::class, 'ban']);
Route::get('/admin/sellers/view/{id}', [AdminSellerController::class, 'view']);




// Route::post('/logout', function () {
//     auth()->logout();
//     request()->session()->invalidate();
//     request()->session()->regenerateToken();

//     return redirect('/login');
// })->name('logout');
