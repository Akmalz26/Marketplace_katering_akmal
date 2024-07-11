<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/merchant/profile', [ProfileController::class, 'index'])->name('merchant.profile.index');
    Route::post('/merchant/profile', [ProfileController::class, 'store'])->name('merchant.profile.store');

    // Merchant Menu Routes
    Route::get('dashboard', [MenuController::class, 'index'])->name('dashboard');
    Route::get('/merchant/menu/create', [MenuController::class, 'create'])->name('merchant.menu.create');
    Route::post('/merchant/menu', [MenuController::class, 'store'])->name('merchant.menu.store');
    Route::get('/merchant/menu/{menu}/edit', [MenuController::class, 'edit'])->name('merchant.menu.edit');
    Route::put('/merchant/menu/{menu}', [MenuController::class, 'update'])->name('merchant.menu.update');
    Route::delete('/merchant/menu/{menu}', [MenuController::class, 'destroy'])->name('merchant.menu.destroy');
});

// Customer Search Routes
Route::middleware('auth,role:customer')->group(function () {
    Route::get('/search', [SearchController::class, 'search'])->name('customer.search');
    Route::get('/order/{menu}', [OrderController::class, 'store'])->name('customer.order');
});

// Order Routes
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/invoice/{order}', [OrderController::class, 'invoice'])->name('orders.invoice');
});
