<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Aula extends Model
{
    use HasFactory;

    protected $table = 'aulas';

    protected $fillable = [
        'turma_id',
        'dia_da_semana',
        'horario',
        'sala',
        'campus',
        'local',
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
