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

//Route::post('/turmas/{turma}/aulas', [AulasController::class, 'adicionarAula']);

Route::middleware('auth-sanctum')->post('/aula/cancelar/{aulaId?}', [ProfessorController::class, 'cancelarAula2']); //para o professor cancelar a aula

Route::middleware('auth:sanctum')->get('/minhasturmas', [ProfessorController::class, 'minhasTurmas']); // OK

Route::middleware('auth:sanctum')->get('/aula/{turmaId?}', [ProfessorController::class, 'aulasDaTurma']); // OK

Route::middleware('auth:sanctum')->get('/aulas', [AlunoController::class, 'aulas']); // OK

