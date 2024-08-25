<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

#Route::get('/', function () {
    #return view('welcome');
#});

Route::get('/usuarios', [UsuariosController::class, 'create']);

Route::get('/usuarios', [UsuariosController::class, 'store']);
