<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\GudangController;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/riwayat', [RiwayatController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('riwayat');

Route::get('/gudang', [GudangController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('gudang');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// Product Routes
Route::middleware(['auth', 'verified',])->group(function () {
    //products routes
            Route::get('/products', [ProductsController::class, 'index'])->name('products.read');
            Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
            Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
            Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
            Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
            Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
            Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');


    //shop routes

        Route::get('/shop', [ShopController::class, 'index'])->name('shop.read');
        Route::get('/shop/{shop}/notifikasi', [ShopController::class, 'notifikasi'])->name('shop.notifikasi');

        Route::get('/shop/{shop}/show', [ShopController::class, 'show'])->name('shop.show');
        Route::get('/shop/cancel', [ShopController::class, 'cancel'])->name('shop.cancel');

        Route::post('/shop/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');



        Route::get('/shop/{product}/create', [ShopController::class, 'create'])->name('shop.create');
        Route::post('/shop/{product}', [ShopController::class, 'store'])->name('shop.store');






});
