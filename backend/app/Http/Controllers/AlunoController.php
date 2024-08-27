<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    
    public function aulas(Request $request) // O aluno pode ver todas as aulas de todas as turmas que ele está matriculado
    {
        // Obtém o aluno autenticado
        $aluno = $request->user();

        // Verifica se o usuário autenticado é um aluno
        if ($aluno->tipo_usuario !== 'aluno') {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }

        // Obtém as turmas em que o aluno está matriculado
        $turmas = $aluno->turmas;

        // Verifica se o aluno está matriculado em alguma turma
        if ($turmas->isEmpty()) {
            return response()->json(['message' => 'O aluno não está matriculado em nenhuma turma.'], 404);
        }

        // Coleta as aulas de todas as turmas
        $aulas = $turmas->flatMap(function ($turma) {
            return $turma->aulas;
        });

        // Retorna as aulas em formato JSON
        return response()->json($aulas);
    }
}