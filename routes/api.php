<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;


Route::get('/product/get/all', [productController::class, 'getAllProducts']);

Route::get('/product/get/{id}', [productController::class, 'getProduct']);

Route::get('/product/get/name/{name}', [productController::class, 'getProductByName']);

Route::get('/product/get/price/{min}/{max}', [productController::class, 'getProductByPrice']);

Route::post('/product/create', [productController::class, 'createProductApi']);

Route::put('/product/update/{id}', [productController::class, 'updateProductApi']);

Route::patch('/product/patch/{id}', [productController::class, 'patchProductApi']);

Route::delete('/product/delete/{id}', [productController::class, 'deleteProductApi']);