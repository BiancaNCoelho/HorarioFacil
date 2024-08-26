<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Notificacao;
use App\Models\Aula;

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

    public function adicionarAula(Request $request, $turmaId)
    {
        // Valida os dados da requisição
        $request->validate([
            'dia_da_semana' => 'required|in:segunda,terça,quarta,quinta,sexta,sábado,domingo',
            'horario' => 'required|date_format:H:i',
            'sala' => 'required|string',
            'campus' => 'required|string',
            'local' => 'nullable|string',
        ]);

        // Busca a turma pelo ID
        $turma = Turma::findOrFail($turmaId);

        // Verifica se o usuário autenticado é o professor da turma
        //if (auth()->user()->id !== $turma->professor_id) {
        //    return response()->json(['message' => 'Ação não autorizada.'], 403);
        //}

        // Cria a nova aula associada à turma
        $aula = $turma->aulas()->create($request->all());

        // Retorna a resposta com a nova aula criada
        return response()->json([
            'message' => 'Aula adicionada com sucesso!',
            'aula' => $aula,
        ], 201);
    }

    public function cancelarAula(Request $request)
    {
        $request->validate([
            'aula_id' => 'required|integer|exists:aulas,id',
        ]);

        $aula = Aula::findOrFail($request->aula_id);

        $aula->update(['cancelada' => true]);

        // Cancelar a aula
        // Marcar como cancelada em um campo ou remover a entrada específica de um registro cíclico
        // (lógica a ser definida com base no sistema específico)

        // Notificar alunos
        //$alunos = $aula->turma->alunos;
        //foreach ($alunos as $aluno) {
        //    Notificacao::create([
        //        'texto' => "A aula de {$aula->turma->nome} foi cancelada",
        //        'tipo_notificacao' => 'cancelamento',
        //        'data' => now()->toDateString(),
        //        'hora' => now()->toTimeString(),
        //        'is_read' => false,
        //        'usuario_id' => $aluno->id,
        //    ]);
        //}

        return response()->json(['message' => 'Aula cancelada com sucesso!'], 200);
    }
}
