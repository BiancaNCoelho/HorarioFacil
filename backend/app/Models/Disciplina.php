<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    // Definir os atributos preenchíveis
    protected $fillable = [
        'nome',
        'codigo',
        'carga_horaria',
    ];

    // Definir casts para os atributos
    protected $casts = [
        'carga_horaria' => 'integer',
    ];

    // Relacionamento de um para um com infoDisciplina
    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}