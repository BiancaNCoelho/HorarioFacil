<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/aluno/{id}/aulas', [AulasController::class, 'aulasDoAluno']);

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::middleware(['auth', 'check.user.type:professor,administrador'])->group(function () {
    Route::post('/aulas', [AulasController::class, 'store']);
    Route::put('/aulas/{aula}', [AulasController::class, 'update']);
    Route::get('/usuarios', [UsuariosController::class, 'index']);
});

Route::get('/aulas', [AulasController::class, 'index']);
Route::post('/aulas', [AulasController::class, 'store']);

Route::get('/aulas/{id}', [AulasController::class, 'show']);
