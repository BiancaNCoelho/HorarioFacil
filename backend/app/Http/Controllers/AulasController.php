<?php
namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Turma;
use Illuminate\Http\Request;
use App\Models\Usuario;

class AulasController extends Controller
{

    public function adicionarAula(Request $request, $turmaId)
    {
        // Validação da aula
        $request->validate([
            'dia_da_semana' => 'required|in:segunda,terça,quarta,quinta,sexta,sábado,domingo',
            'horario' => 'required|date_format:H:i',
            'sala' => 'required|string|max:255',
            'campus' => 'required|string|max:255',
            'local' => 'nullable|string|max:255',
        ]);

        // Encontra a turma pelo ID
        $turma = Turma::findOrFail($turmaId);

        // Recupera todos os alunos matriculados na turma
        $alunos = $turma->alunos; // Assumindo que você tem o relacionamento 'alunos' na model Turma

        // Cria o relacionamento na tabela aula_usuario

        $aula = $turma->aulas()->create($request->all());

        foreach ($alunos as $aluno) {
            $aula->alunos()->attach($aluno->id);
        }
        // Retorna a resposta com a nova aula criada
        return response()->json([
            'message' => 'Aula adicionada com sucesso!',
            'aula' => $aula,
        ], 201);

    }
    public function cancelarAula(Request $request)
    {
        $professor_id = $request->user()->id;
        $request->validate([
            'aula_id' => 'required|integer|exists:aulas,id',
        ]);

        $aula = Aula::findOrFail($request->aula_id);

        $aula->update(['cancelada' => true]);

        return response()->json(['message' => 'Aula cancelada com sucesso!'], 200);
    }

}
