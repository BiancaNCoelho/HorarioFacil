<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacao';

    protected $fillable = [
        'texto',
        'tipo_notificacao',
        'data',
        'hora',
        'is_read',
    ];
}
