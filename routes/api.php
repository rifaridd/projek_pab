<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReservasiController;
use App\Http\Controllers\Api\MejaController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\PesananController;
use App\Http\Controllers\Api\PesananItemController;
use App\Http\Controllers\Api\UserController; 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --------------------------------------------------------------------------
// API Routes untuk Proyek Restoran Lumière (Versi 1)
// --------------------------------------------------------------------------

// 1. Endpoint Meja Restoran
Route::apiResource('/v1/mejas', MejaController::class);

// 2. Endpoint Reservasi Pelanggan
Route::apiResource('/v1/reservasi', ReservasiController::class);

// 3. Endpoint Menu Makanan & Minuman
Route::apiResource('/v1/menus', MenuController::class);

// 4. Endpoint Pesanan Transaksi
Route::apiResource('/v1/pesanans', PesananController::class);

// 5. Endpoint Detail Item Pesanan
Route::apiResource('/v1/pesanan-items', PesananItemController::class);

// 6. Endpoint User / Pengguna
Route::apiResource('/v1/users', UserController::class); 