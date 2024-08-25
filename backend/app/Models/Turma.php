<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas';

    protected $fillable = [
        'nome',
        'data_inicio',
        'data_fim',
        'disciplina_id',
        'professor_id',
    ];

    // Relacionamento de um para um com Disciplina
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'professor_id');
    }

    public function aula()
    {
        return $this->hasMany(Aula::class);
    }

    public function alunos()
    {
        return $this->hasMany(Usuario::class, 'matriculas')->withPivot('matricula');
    }

    public function adicionarAlunos(array $matriculas)
    {
        foreach ($matriculas as $matricula) {
            // Encontrar o usuário com a matrícula
            $usuario = Usuario::where('matricula', $matricula)->first();

            if ($usuario) {
                // Criar uma nova entrada na tabela 'matriculas'
                Matricula::create([
                    'usuario_id' => $usuario->id,
                    'turma_id' => $this->id,
                ]);

                // Enviar notificação ao aluno
                Notificacao::create([
                    'texto' => "Você foi matriculado na turma {$this->nome}.",
                    'tipo_notificacao' => 'matricula',
                    'data' => now()->toDateString(),
                    'hora' => now()->toTimeString(),
                    'is_read' => false,
                    'usuario_id' => $usuario->id,
                ]);
            }
        }
    }
}