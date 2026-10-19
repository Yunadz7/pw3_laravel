<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['nome' => 'Eletrônicos']);
        Categoria::create(['nome' => 'Roupas']);
        Categoria::create(['nome' => 'Alimentos e Bebidas']);
        Categoria::create(['nome' => 'Móveis']);
    }
}