<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $fillable = [
        'nome_oficina',
        'professor_responsavel',
        'carga_horaria',
        'turno',
    ];
    
}
