<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AuthController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class,'logout']);
    Route::get('/user', [AuthController::class,'user']);
    Route::get('/checktoken',[AuthController::class,'checktoken']);
    Route::get('/listchangestatus/{id}',[OrderController::class,'getChangestatus']);

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('brands', BrandController::class);

    Route::apiResource('orders', OrderController::class);
    
});





Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);


Route::get('/brand/create', [BrandController::class,'create']);

Route::get('/category/create', [CategoryController::class,'create']);
Route::get('/category/edit/{id}', [CategoryController::class,'edit']);
// Route::get('/orders', [OrderController::class, 'index']);