@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Catálogo de Produtos</h1>
            <p class="text-gray-600 text-sm">Gerencie o estoque e os preços dos itens cadastrados.</p>
        </div>
        <a href="{{ route('produtoscategoria.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded shadow">
            Novo Produto
        </a>
    </div>

    @if(session('sucesso'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estoque</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($produtos as $produto)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $produto->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $produto->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full font-medium">
                                {{ $produto->categoria->nome }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $produto->quantidade_estoque }} un
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('produtoscategoria.edit', $produto) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            <form action="{{ route('produtoscategoria.destroy', $produto) }}" method="POST" class="inline" onsubmit="return confirm('Deseja realmente remover este produto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            Nenhum produto cadastrado até o momento.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $produtos->links() }}
    </div>
</div>
@endsection