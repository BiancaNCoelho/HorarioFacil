<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacaos';

    protected $fillable = [
        'texto',
        'tipo_notificacao',
        'data',
        'hora',
        'is_read',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
