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

    public function professor()
    {
        return $this->belongsTo(Usuario::class, 'professor_id');
    }

    public function aulas()
    {
        return $this->hasMany(Aula::class, 'turma_id');
    }

    public function alunos()
    {
        return $this->belongsToMany(Usuario::class, 'matriculas', 'turma_id', 'usuario_id')->withPivot('matricula');
    }

    public function adicionarAlunos(array $matriculas)
    {
        foreach ($matriculas as $matricula) {
            $usuario = Usuario::where('matricula', $matricula)->first();

            if ($usuario) {
                // Adiciona o aluno à turma
                $this->alunos()->attach($usuario->id, ['matricula' => $matricula]);

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