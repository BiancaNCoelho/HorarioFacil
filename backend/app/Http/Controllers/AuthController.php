<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Valida as credenciais do usuário
        $request->validate([
            'email' => 'required|string|email',
            'senha' => 'required|string',
        ]);

        // Tenta encontrar o usuário com base no email
        $usuario = Usuario::where('email', $request->email)->first();

        // Verifica se o usuário existe e se a senha está correta
        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais estão incorretas.'],
            ]);
        }

        // Gera um token de autenticação para o usuário
        $token = $usuario->createToken('auth_token')->plainTextToken;

        // Retorna a resposta com o token e informações do usuário
        return response()->json([
            'message' => 'Login realizado com sucesso!',
            'usuario' => $usuario,
            'token' => $token,
        ]);
    }
}
