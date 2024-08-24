<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'aula';

    protected $fillable = [
        'nome',
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

}