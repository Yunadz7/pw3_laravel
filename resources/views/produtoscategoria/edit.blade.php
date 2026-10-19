@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Editar Produto</h1>
        <p class="text-gray-600 text-sm">Altere as informações do produto cadastrado.</p>
    </div>

    <form action="{{ route('produtoscategoria.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome do Produto</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $produto->nome) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border" required>
            @error('nome')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $produto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label for="preco" class="block text-sm font-medium text-gray-700 mb-1">Preço (R$)</label>
                <input type="number" step="0.01" name="preco" id="preco" value="{{ old('preco', $produto->preco) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border" required>
                @error('preco')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="quantidade_estoque" class="block text-sm font-medium text-gray-700 mb-1">Quantidade em Estoque</label>
                <input type="number" name="quantidade_estoque" id="quantidade_estoque" value="{{ old('quantidade_estoque', $produto->quantidade_estoque) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 border" required>
                @error('quantidade_estoque')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('produtoscategoria.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Atualizar Produto</button>
        </div>
    </form>
</div>
@endsection