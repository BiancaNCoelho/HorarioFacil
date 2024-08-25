<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    public function aulasDoAluno($alunoId)
    {
        // Encontra o aluno pelo ID
        $aluno = Usuario::findOrFail($alunoId);

        // Obtém as turmas em que o aluno está matriculado
        $turmas = $aluno->turmas;

        // Inicializa uma coleção vazia para armazenar todas as aulas
        $aulas = collect();

        // Itera pelas turmas para pegar as aulas associadas
        foreach ($turmas as $turma) {
            $aulas = $aulas->merge($turma->aulas);
        }

        // Retorna as aulas em formato JSON
        return response()->json($aulas);
    }
}
