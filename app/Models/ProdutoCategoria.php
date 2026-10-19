<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoCategoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'quantidade_estoque',
        'categoria_id',
    ];

    /**
     * Um produto pertence a uma única categoria.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}