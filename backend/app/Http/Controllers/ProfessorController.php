<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Aula;


class ProfessorController extends Controller
{
    // Método para mostrar as turmas do professor autenticado
    public function minhasTurmas(Request $request)
    {
        // Verifica se o tipo de usuário é professor
        if ($request->user()->tipo_usuario !== 'professor') {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }
        // Obtém o ID do professor autenticado
        $professorId = $request->user()->id;

        // Busca as turmas onde o professor é o responsável
        $turmas = Turma::where('professor_id', $professorId)->get();

        // Retorna as turmas em formato JSON
        return response()->json($turmas);
    }

    // Método para mostrar as turmas do professor, baseado no ID de turma
    public function aulasDaTurma(Request $request, $turmaId)
    {

        // Verifica se o tipo de usuário é professor
        if ($request->user()->tipo_usuario !== 'professor') {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }
        // Obtém o ID do professor autenticado
        $professorId = $request->user()->id;

        // Busca as turmas onde o professor é o responsável
        $turmas = Turma::where('professor_id', $professorId)->get();

        // Verifica se a turma pertence ao professor
        $turma = $turmas->find($turmaId);
        if (!$turma) {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }

        // Retorna as aulas da turma em formato JSON
        return response()->json($turma->aulas);

    }
    
    // Método para o professor cancelar a aula, baseado no ID da aula
    public function cancelarAula(Request $request, $aulaId)
    {
        $tipo_de_usuario = $request->user()->tipo_usuario;
        $id_usuario = $request->user()->id;

        if ($tipo_de_usuario == 'aluno') {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }

        // SE O ADMINISTRADOR CANCELAR É PARA REGISTRAR NUMA TABELA, PARA NOTIFICAR O PROFESSOR
        //if ($tipo_de_usuario == 'administrador'){
        //return response()->json(['message' => 'Aula cancelada.'], 200);
        //}

        $aula = Aula::where('id', $aulaId)
            ->whereHas('turma', function ($query) use ($request) {
                $query->where('professor_id', $request->user()->id);
            })
            ->first();

        if (!$aula) {
            return response()->json(['message' => 'Aula não encontrada ou você não tem permissão para cancelá-la.'], 404);
        }

        // Marca a aula como cancelada
        $aula->update(['cancelada' => true]);

        return response()->json(['message' => 'Aula cancelada com sucesso!'], 200);
    }
}