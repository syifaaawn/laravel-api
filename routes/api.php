<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\BukuApiController;
use App\Http\Controllers\Api\ProdukApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;

Route::apiResource('users', UserApiController::class);
Route::apiResource('bukus', BukuApiController::class);
Route::apiResource('produks', ProdukApiController::class);
Route::post('/produks/{id}/images', [ProdukApiController::class, 'uploadImages']);
Route::post('/produks/{id}/images/update', [ProdukApiController::class, 'updateImages']);
Route::apiResource('orders', OrderApiController::class);
Route::put('orders/{id}/status', [OrderApiController::class, 'updateStatus']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user(); // Contoh: return data user yang login
    });

    Route::post('/logout', [AuthController::class, 'logout']); // Optional: revoke token

    // Tambah route API lain di sini, misal Route::apiResource('posts', PostController::class);

});

