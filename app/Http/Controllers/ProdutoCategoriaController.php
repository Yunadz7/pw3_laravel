<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoCategoriaController extends Controller
{
    /**
     * Lista todos os produtos carregando a categoria relacionada (Eager Loading).
     */
    public function index()
    {
        $produtos = Produto::with('categoria')->orderBy('id', 'desc')->paginate(10);
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Exibe o formulário de cadastro enviando a lista de categorias.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('produtos.create', compact('categorias'));
    }

    /**
     * Valida os dados e salva o novo produto no banco.
     */
    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|min:3|max:255',
            'preco' => 'required|numeric|min:0.01',
            'quantidade_estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Produto::create($dadosValidados);

        return redirect()->route('produtos.index')->with('sucesso', 'Produto cadastrado com sucesso');
    }

    /**
     * Exibe os detalhes de um produto específico.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Exibe o formulário de edição com os dados atuais e as categorias disponíveis.
     */
    public function edit(Produto $produto)
    {
        $categorias = Categoria::orderBy('nome', 'asc')->get();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Valida e atualiza as informações do produto.
     */
    public function update(Request $request, Produto $produto)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|min:3|max:255',
            'preco' => 'required|numeric|min:0.01',
            'quantidade_estoque' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $produto->update($dadosValidados);

        return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado com sucesso');
    }

    /**
     * Exclui o produto do banco de dados.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto removido com sucesso');
    }
}