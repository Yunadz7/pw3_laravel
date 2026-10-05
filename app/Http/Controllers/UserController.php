<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Exibe a listagem de usuários com suporte a filtro de busca.
     */
    public function index(Request $request)
    {
        // Captura o termo de busca enviado pelo formulário GET
        $busca = $request->input('busca');

        // Se houver busca, filtra por nome; caso contrário, busca todos ordenados por nome
        if ($busca) {
            $usuarios = User::where('name', 'like', "%{$busca}%", 'and')
                ->orderBy('name', 'asc')
                ->get();
        } else {
            $usuarios = User::orderBy('name', 'asc')->get();
        }

        // Retorna a view do painel passando a coleção de usuários e o termo pesquisado
        return view('admin.dashboard', compact('usuarios', 'busca'));
    }

    /**
     * Exibe o formulário de cadastro de usuários.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Salva o novo usuário no banco de dados com validação.
     */
    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create($dadosValidados);

        return redirect('/admin')->with('sucesso', 'Usuário cadastrado com sucesso');
    }
}