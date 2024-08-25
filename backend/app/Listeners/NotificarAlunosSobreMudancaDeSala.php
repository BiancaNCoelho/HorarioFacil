<?php
namespace App\Listeners;

use App\Events\SalaAtualizada;
use App\Models\Matricula;
use App\Models\Notificacao;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificarAlunosSobreMudancaDeSala
{
    public function __construct()
    {
        //
    }

    public function handle(SalaAtualizada $event)
    {
        $turma = $event->turma;
        $alunos = $turma->alunos; // Assuming `alunos` is a relationship in Turma model

        foreach ($alunos as $aluno) {
            Notificacao::create([
                'texto' => "A sala da turma {$turma->nome} foi alterada para {$turma->sala}.",
                'tipo_notificacao' => 'alteração_sala',
                'data' => now()->format('Y-m-d'),
                'hora' => now()->format('H:i:s'),
                'is_read' => false,
            ]);
        }
    }
}
