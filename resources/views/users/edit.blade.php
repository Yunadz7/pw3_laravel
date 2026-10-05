@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <section class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded-xl shadow-sm ring-1 ring-slate-200">
        <div class="flex items-center justify-between pb-4 border-b border-slate-200">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Editar Usuário</h2>
                <p class="text-slate-600 mt-1">Altere as informações cadastrais do registro #{{ $usuario->id }}.</p>
            </div>
            <span class="text-xs bg-indigo-50 text-indigo-700 font-medium px-2.5 py-1 rounded-full">
                ID: {{ $usuario->id }}
            </span>
        </div>

        <!-- Exibição de erros de validação -->
        @if ($errors->any())
            <div class="mt-4 p-4 bg-rose-50 border border-rose-200 rounded-lg text-sm text-rose-700">
                <p class="font-semibold text-rose-800">Por favor, corrija os problemas abaixo:</p>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/usuarios/{{ $usuario->id }}" method="POST" class="mt-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Nome Completo</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $usuario->name) }}"
                    class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                >
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Endereço de E-mail</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $usuario->email) }}"
                    class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Nova Senha (opcional)</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Deixe em branco para manter a senha atual"
                    class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 placeholder-slate-400 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                >
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="/admin" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Cancelar
                </a>
                <button type="submit" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </section>
@endsection