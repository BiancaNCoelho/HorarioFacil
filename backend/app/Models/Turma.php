<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'aula';

    protected $fillable = [
        'disciplina_id',
        'turma',
        'professor_id',
    ];

    // Relacionamento de um para um com Disciplina
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }

    public function Aula()
    {
        return $this->hasMany(Aula::class);
    }

}