<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;


Route::get('/product/get/all', [productController::class, 'getAllProducts']);

Route::get('/product/get/{id}', [productController::class, 'getProduct']);

Route::get('/product/get/name/{name}', [productController::class, 'getProductByName']);

Route::get('/product/get/price/{min}/{max}', [productController::class, 'getProductByPrice']);

Route::post('/product/create', [productController::class, 'createProductApi']);

Route::put('/product/update/{id}', [productController::class, 'updateProductApi']);

Route::patch('/product/patch/{id}', [productController::class, 'patchProductApi']);

Route::delete('/product/delete/{id}', [productController::class, 'deleteProductApi']);


// Rutas usuario

Route::post('/user/create', [userController::class, 'createUserApi']);

Route::post('/user/login', [userController::class, 'loginUser']);


// Rutas usuario

Route::post('/user/logout', [userController::class, 'logout']);



Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user/get/{id}', [userController::class, 'getUserId']);

    Route::get('/user/get', [userController::class, 'getUsers']);

});