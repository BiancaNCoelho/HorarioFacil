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

    public function cancelarAula(Request $request, $aulaId)
    {
        // Verifica se o tipo de usuário é professor
        if ($request->user()->tipo_usuario !== 'professor') {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }

        // Obtém o ID do professor autenticado
        $professorId = $request->user()->id;

        // Busca as turmas onde o professor é o responsável
        $turmas = Turma::where('professor_id', $professorId)->get();

        // Verifica se a aula pertence ao professor
        $aula = $turmas->flatMap(function ($turma) {
            return $turma->aulas;
        })->find($aulaId);

        if (!$aula) {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }

        // Cancela a aula
        $aula->delete();

        // Retorna a mensagem de sucesso
        return response()->json(['message' => 'Aula cancelada com sucesso.']);
    }
    public function cancelarAula2(Request $request)
    {
        // Verifica se o tipo de usuário é professor
        if ($request->user()->tipo_usuario !== 'professor') {
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }

        $professor_id = $request->user()->id;
        $request->validate([
            'aula_id' => 'required|integer|exists:aulas,id',
        ]);

        $aula = Aula::findOrFail($request->aula_id);

        $aula->update(['cancelada' => true]);

        return response()->json(['message' => 'Aula cancelada com sucesso!'], 200);
    }
}