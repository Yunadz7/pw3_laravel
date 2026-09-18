<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca');

        if ($busca) {
            $eventos = Evento::where('titulo', 'like', '%' . $busca . '%')
                ->orderBy('titulo', 'asc')
                ->get();
        } else {
            $eventos = Evento::orderBy('titulo', 'asc')->get();
        }

        return view('eventos.index', compact('eventos', 'busca'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'titulo'          => 'required|min:3',
            'local'           => 'required|min:2',
            'vagas'           => 'required|integer|min:1',
            'preco_inscricao' => 'required|numeric|min:0',
        ]);

        Evento::create($dadosValidados);

        return redirect('/eventos')->with('sucesso', 'Evento cadastrado com sucesso!');
    }
}