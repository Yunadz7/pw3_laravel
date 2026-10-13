@extends('layouts.app')

@section('title', 'Painel Administrativo')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Topo do Painel com Ações -->
    <section class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Painel Administrativo</h2>
            <p class="text-slate-600 mt-1">Gerencie os usuários cadastrados e visualize as métricas do sistema.</p>
        </div>
        <a href="/usuarios/novo" class="rounded-lg bg-slate-900 px-4 py-2 font-medium text-white hover:bg-slate-700 transition-colors">
            Novo Usuário
        </a>
    </section>

    <!-- Barra de Filtro e Busca -->
    <section class="mt-6 bg-white p-4 rounded-xl shadow-sm ring-1 ring-slate-200">
        <form action="/admin" method="GET" class="flex flex-wrap items-center gap-3">
            <div class="flex-1 min-w-[240px]">
                <input
                    type="text"
                    name="busca"
                    value="{{ $busca ?? '' }}"
                    placeholder="Pesquisar usuário por nome..."
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 placeholder-slate-400 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                >
            </div>
            <button type="submit" class="rounded-lg bg-slate-800 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                Filtrar
            </button>

            @if(!empty($busca))
                <a href="/admin" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
                    Limpar Filtro
                </a>
            @endif
        </form>
    </section>

    <!-- Tabela Dinâmica de Registros -->
    <section class="mt-6 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="border-b border-slate-200 px-6 py-4 flex justify-between items-center">
            <h3 class="font-semibold text-slate-800">Lista de Usuários</h3>
            <span class="text-xs bg-slate-100 text-slate-600 font-medium px-2.5 py-1 rounded-full">
                Total: {{ $usuarios->count() }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-semibold uppercase text-slate-700">
                    <tr>
                        <th class="px-6 py-3">Código</th>
                        <th class="px-6 py-3">Nome</th>
                        <th class="px-6 py-3">E-mail</th>
                        <th class="px-6 py-3">Data de Cadastro</th>
                        <th class="px-6 py-3 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($usuarios as $usuario)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-slate-500">#{{ $usuario->id }}</td>
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $usuario->name }}</td>
                            <td class="px-6 py-4">{{ $usuario->email }}</td>
                            <td class="px-6 py-4 text-slate-500">{{ $usuario->created_at ? $usuario->created_at->format('d/m/Y H:i') : 'Não informada' }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="/usuarios/{{ $usuario->id }}/editar" class="text-indigo-600 hover:text-indigo-900 font-medium text-xs">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                                @if(!empty($busca))
                                    Nenhum usuário encontrado para a busca "<strong class="text-slate-700">{{ $busca }}</strong>".
                                @else
                                    Nenhum usuário cadastrado no momento.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection