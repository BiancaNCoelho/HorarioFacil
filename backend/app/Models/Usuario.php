<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Definir os atributos preenchíveis
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'password',
        'tipo_usuario',
        'departamento',
        'curso',
        'nivel',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // Ocultar atributos sensíveis
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'nivel' => 'integer',
        //'email_verified_at' => 'datetime',
        'password' => 'hashed',
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

