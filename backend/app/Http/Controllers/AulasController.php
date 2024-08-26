<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    // Mostre todos os alunos com um método index
    public function index()
    {
        return response()->json(Usuario::all());
    }

    // Mostre as aulas em que o aluno está matriculado
    public function aulasDoAluno($alunoId)
    {
        // Encontra o aluno pelo ID
        $aluno = Usuario::findOrFail($alunoId);

        // Obtém as turmas em que o aluno está matriculado
        $turmas = $aluno->turmas;

        // Verifica se o aluno está matriculado em alguma turma
        if ($turmas->isEmpty()) {
            return response()->json(['message' => 'O aluno não está matriculado em nenhuma turma.'], 404);
        }

        // Coleta as aulas de todas as turmas
        $aulas = $turmas->flatMap(function ($turma) {
            return $turma->aulas; // Correção do relacionamento
        });

        // Retorna as aulas em formato JSON
        return response()->json($aulas);
    }
}
