<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllera\Auth\UsuariosController; // define usuarios

#Route::get('/', function () {
    #return view('welcome');
#});

Route::get('/usuarios', [UsuariosController::class, 'create']);

Route::get('/usuarios', [UsuariosController::class, 'store']);
