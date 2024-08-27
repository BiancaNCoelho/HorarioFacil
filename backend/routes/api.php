<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TurmasController;
use App\Http\Controllers\ProfessorController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/usuarios', [AdminController::class, 'index']); // OK

//Route::middleware('auth:sanctum')->post('/aula/nova/{$turmaId}', [AulasController::class, 'adicionarAula2']); // FALTA ARRUMAR

Route::middleware('auth:sanctum')->post('/aula/cancelar/{aulaId?}', [ProfessorController::class, 'cancelarAula']); // OK

Route::middleware('auth:sanctum')->get('/turma', [ProfessorController::class, 'minhasTurmas']); // OK

Route::middleware('auth:sanctum')->get('/aula/{turmaId?}', [ProfessorController::class, 'aulasDaTurma']); // OK

Route::middleware('auth:sanctum')->get('/aulas', [AlunoController::class, 'aulas']); // OK

