<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Definir os atributos preenchíveis
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'senha',
        'tipo_usuario',
        'departamento',
        'curso',
        'nivel',
    ];

    // Ocultar atributos sensíveis
    protected $hidden = [
        'senha',
    ];

    // Definir casts para os atributos
    protected $casts = [
        'nivel' => 'integer',
    ];

    public function aula()
    {
        return $this->hasMany(Aula::class);

    }

    public function notificacao()
    {
        return $this->hasMany(Notificacao::class);
    }
}