<?php

namespace App\Observers;

use App\Models\Aula;
use App\Models\Notificacao;
use App\Models\Usuario;

class AulaObserver
{
    public function updated(Aula $aula)
    {
        // Verificar se o horário ou o local foram modificados
        if ($aula->wasChanged(['horario', 'local', 'dia_da_semana'])) {
            $this->notificarAlunos($aula, "A aula foi modificada.");
        }

        // Verificar se a aula foi cancelada (você pode definir um atributo como 'cancelada')
        if ($aula->wasChanged('cancelada') && $aula->cancelada) {
            $this->notificarAlunos($aula, "A aula foi cancelada.");
        }
    }

    protected function notificarAlunos(Aula $aula, $mensagem)
    {
        // Encontrar os alunos associados à turma da aula
        $alunos = $aula->turma->alunos;

        foreach ($alunos as $aluno) {
            // Criar uma nova notificação para cada aluno
            Notificacao::create([
                'usuario_id' => $aluno->id,
                'texto' => $mensagem,
                'tipo_notificacao' => 'alteracao_aula',
                'data' => now()->toDateString(),
                'hora' => now()->toTimeString(),
                'is_read' => false,
            ]);
        }
    }
}
