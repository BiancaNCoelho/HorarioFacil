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
        $tipo_de_usuario = $request->user()->tipo_de_usuario;
        $id_do_usuario = $request->user()->id;

        if ($tipo_de_usuario == 'aluno') {
            return response()->json([
                'message' => 'Erro: Você não tem permissão para adicionar aulas.',
            ], 403);
        } else if ($tipo_de_usuario == 'professor') {
            $professor = Usuario::findOrFail($id_do_usuario);
            $turma = $professor->turmas()->where('id', $turmaId)->first();
            if (!$turma) {
                return response()->json([
                    'message' => 'Você não tem permissão para adicionar aulas a esta turma.',
                ], 403);
            }
        } else {
            return response()->json([
                'message' => 'Você não tem permissão para adicionar aulas a esta turma.',
            ], 403);
        }
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
    public function adicionarAula2(Request $request, $turmaId)
{
    $user = $request->user();

    // Verifica permissão do usuário
    if ($user->tipo_usuario === 'aluno') {
        return response()->json(['message' => 'Erro: Você não tem permissão para adicionar aulas.'], 403);
    }

    $turma = Turma::where('id', $turmaId)
        ->when($user->tipo_usuario === 'professor', function ($query) use ($user) {
            $query->where('professor_id', $user->id);
        })
        ->first();

    if (!$turma) {
        return response()->json(['message' => 'Você não tem permissão para adicionar aulas a esta turma.'], 403);
    }

    // Validação dos dados da aula
    $request->validate([
        'dia_da_semana' => 'required|in:segunda,terça,quarta,quinta,sexta,sábado,domingo',
        'horario' => 'required|date_format:H:i',
        'sala' => 'required|string|max:255',
        'campus' => 'required|string|max:255',
        'local' => 'nullable|string|max:255',
    ]);

    // Cria a aula e associa aos alunos
    $aula = $turma->aulas()->create($request->all());
    $aula->alunos()->attach($turma->alunos->pluck('id'));

    return response()->json(['message' => 'Aula adicionada com sucesso!', 'aula' => $aula], 201);
}


}
