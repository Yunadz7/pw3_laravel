<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();

        return view('livros.livros', compact('livros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:3',
            'autor' => 'required|min:3',
            'ano_publicacao' => 'required|integer|min:1|max:' . date('Y')
        ]);

        Livro::create($request->all());

        return redirect('/livros');
    }
}