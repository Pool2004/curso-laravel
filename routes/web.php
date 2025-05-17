<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para productos - Middleware (Guest)


Route::middleware('guest')->get('/productos', [ProductController::class, 'index'])->name('products');

// Rutas para ver producto - Middleware (Guest)

Route::middleware('guest')->get('/get/product', [ProductController::class, 'viewProduct'])->name('view_product');
Route::middleware('guest')->post('/get/product/id', [ProductController::class, 'findProduct'])->name('find_product');


// Rutas para productos - Middleware  (Auth)

Route::middleware('auth')->group(function () {
    
    Route::get('/create/product', [ProductController::class, 'viewCreate'])->name('view_create_product');
    Route::post('/save/product', [ProductController::class, 'createProduct'])->name('create_product');

});

require __DIR__.'/auth.php';
