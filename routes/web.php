<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/details/{id}', [FrontController::class, 'productDetails'])->name('details');
//Route::get('/product-details/{productId}', [FrontController::class, 'productDetails'])->name('product-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/add-product', [ProductController::class, 'index'])->name('add-product');
    Route::post('/new-product', [ProductController::class, 'store'])->name('new-product');
    Route::get('/manage-product', [ProductController::class, 'show'])->name('manage-product');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete-product');
});
