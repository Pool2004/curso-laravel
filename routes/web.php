<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [userController::class, 'index']);

Route::get('/product', [productController::class, 'index']);


