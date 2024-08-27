<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Verifica o tipo de usuário para permissão de administrador
        if ($request->user()->tipo_usuario !== 'administrador') {
            return response()->json(['message' => 'Acesso negado.'], 403);
        }
        return response()->json(Usuario::all());
    }

    public function store(Request $request)
    {
        // Verifica o tipo de usuário para permissão de administrador
        if ($request->user()->tipo_usuario !== 'administrador') {
            return response()->json(['message' => 'Acesso negado.'], 403);
        }
        // Validação dos dados da requisição
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'senha' => 'required|string|min:8',
        ]);

        // Criação de um novo usuário
        $usuario = Usuario::create([
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'senha' => bcrypt($validatedData['senha']),
        ]);

        // Retorno da resposta JSON com o usuário criado
        return response()->json($usuario, 201);
    }
}