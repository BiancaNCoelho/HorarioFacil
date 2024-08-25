<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    // Define a tabela associada
    protected $table = 'matriculas';

    // Defina os campos que podem ser preenchidos
    protected $fillable = [
        'usuario_id',
        'turma_id',
        'matricula',
    ];

    // Relacionamento com o model Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relacionamento com o model Turma
    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
