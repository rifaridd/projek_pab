<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReservasiController;
use App\Http\Controllers\Api\MejaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Menggunakan apiResource dengan prefiks /v1/ untuk Reservasi dan Mejas
Route::apiResource('/v1/reservasi', ReservasiController::class);
Route::apiResource('/v1/mejas', MejaController::class);