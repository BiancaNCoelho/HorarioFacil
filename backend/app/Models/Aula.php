<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $table = 'aula';

    protected $fillable = [
        'sala',
        'horario_inicio',
        'horario_fim',
        'disciplina_id',
        'semana',
        'predio',
        'turma',
    ];

    protected $casts = [
        'semana' => 'json',
    ];

    // Relacionamento de um para um com Disciplina
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

}