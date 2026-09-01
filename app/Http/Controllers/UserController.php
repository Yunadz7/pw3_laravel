<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * exibe o formulário de cadastro de usuários
     */
    public function create()
    {
        return view('users.create');
    }
    /**
     * Salvar o novo usuário no banco de dados com validação
     */
    public function store(Request $request)
    {
        $dadosValidos = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'

        ]);
        User::create($dadosValidos);
        //Validação dos campos de formulários
        // Persistência no banco de dados usando o ORM Eloquent
        // Redirecionar para o painel administrativo com mensagens de sucesso

        return redirect('/admin')->with('sucesso','Usuário Cadastrado com sucesso');
    }
}
