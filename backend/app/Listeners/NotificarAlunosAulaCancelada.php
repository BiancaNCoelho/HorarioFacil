<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\AulaCancelada;
use App\Models\Turma;
use App\Models\Usuario;
use App\Models\Notificacao;

class NotificarAlunosAulaCancelada
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AulaCancelada $aulaCancelada, Turma $turma): void
    {
        //
        $aula = $aulaCancelada->aula;
        $turma = $aula->turma;
        $alunos = Usuario::where('tipo_usuario', 'aluno')
            ->whereHas('turmas', function ($query) use ($turma) {
                $query->where('id', $turma->id);
            })->get();
            
        foreach ($alunos as $aluno) {
            Notificacao::create([
                'texto' => "A aula de {$turma->nome} em {$aula->dia_da_semana} às {$aula->horario} foi cancelada.",
                'tipo_notificacao' => 'cancelamento',
                'data' => now()->toDateString(),
                'hora' => now()->toTimeString(),
                'is_read' => false,
                'usuario_id' => $aluno->id,
            ]);
        }
    }
}
