<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    /**
     * Atributos permitidos para atribuição em massa.
     */
    protected $fillable = [
        'titulo',
        'local',
        'vagas',
        'preco_inscricao',
    ];
}