<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('products', ProductController::class);
    
    Route::apiResource('orders', OrderController::class)->only(['index', 'store', 'show']);
    Route::patch('/orders/{order}/status/{status}', [OrderController::class, 'updateStatus']);
});
Route::post('/products', [ProductController::class, 'store'])->middleware(['auth:sanctum', 'role:admin']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductController::class)
        ->middleware('role:admin')
        ->except(['index', 'show']);
});
Route::middleware(['auth:sanctum', 'role:admin'])->post('/products', [ProductController::class, 'store']);