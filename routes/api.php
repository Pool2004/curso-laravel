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





Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user/get/{id}', [userController::class, 'getUserId']);

    Route::get('/user/get', [userController::class, 'getUsers']);

    Route::delete('/user/logout', [userController::class, 'logout']);

});


// Endpoint de prueba - Obligatorio

use Illuminate\Session\Middleware\StartSession;

Route::middleware([StartSession::class])->group(function () {
    Route::get('/get/number-optional/{id?}', function ($id = 0) {
        session(['id' => $id]);
        return response()->json(['number' => $id]);
    });

    Route::get('/number/get', function () {
        $id = session('id', 0);
        return response()->json(['number' => $id]);
    });

    
});


Route::get('/test/number/{id}', function($id) {
    return response()->json(["Number" => $id]);
});

// Endpoint de prueba - Opcional

Route::get('/test-optional/number/{id?}', function($id = 0){
    return response()->json(["Number" => $id]);
});

// Endpoint de prueba - restringido

Route::get('/test/restricted/{id}', function($id){
    return response()->json(["Number" => $id]);
})->where('id', '[1-9]+');

// Endpoint de prueba - Multiples

Route::get('/test/{name}/{id?}', function($name, $id = 0){
    return response()->json(["Name" => $name, "Number" => $id]);
})->where(['name' => '[a-zA-Z]+', 'id' => '[0-9]+']);


