<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;

Route::get('/user', [userController::class, 'index']);

Route::get('/', [productController::class, 'index'])->name('products');

// Rutas para crear

Route::get('/create', [productController::class, 'viewCreate'])->name('create');
Route::post('/product/create', [productController::class, 'createProduct'])->name('createProduct');

// Rutas para actualizar

Route::get('/update', [productController::class, 'viewUpdate'])->name('update');
Route::post('/product/update', [productController::class, 'updateProduct'])->name('updateProduct');

// Rutas para eliminar

Route::get('/delete', [productController::class, 'viewDelete'])->name('delete');
Route::post('/product/delete', [productController::class, 'deleteProduct'])->name('deleteProduct');

// Rutas para ver un producto

Route::get('/view', [productController::class, 'viewProduct'])->name('view');
Route::post('/product/view', [productController::class, 'findProduct'])->name('viewProduct');




