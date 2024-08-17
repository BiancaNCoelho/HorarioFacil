<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/aulas', [AulasController::class, 'index']);
Route::post('/aulas', [AulasController::class, 'store']);
