<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    /**
     * Exibe a listagem de usuários com suporte a filtro de busca
     */
    public function index(Request $request)
    {
        //captura o termo de busca enviado pelo GET
        $busca = $request -> input('busca');

        //Se houver busca, filtra pro nome; caso contrário, busca todos ordenados por nome 
        if ($busca){
            $usuarios = User::where('name', 'like', "%{busca}%", 'and') ->orderBy('name', 'ASC')->get();
        } else {
            $usuarios = User::orderBy('name', 'ASC') ->get();
        }
        // Retorna a view do painel passando a coleção de usuários e o termo de pesquisa
        return view('admin.dashboard', compact('usuarios', 'busca'));
    }
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
