<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DisciplinasController extends Controller
{
    public function __construct()
    {
        // Middleware para garantir que apenas administradores possam acessar este controlador
        //$this->middleware('can:create,App\Models\Disciplina');
    }

    /**
     * Cria uma nova disciplina.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Valida a entrada
        $request->validate([
            'nome' => 'required|string|max:255',
            'codigo' => 'required|string|unique:disciplinas,codigo',
            'carga_horaria' => 'required|integer',
        ]);

        // Cria a nova disciplina
        $disciplina = Disciplina::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'carga_horaria' => $request->carga_horaria,
        ]);

        // Retorna uma resposta de sucesso
        return response()->json([
            'message' => 'Disciplina criada com sucesso!',
            'disciplina' => $disciplina,
        ], 201);
    }
}
