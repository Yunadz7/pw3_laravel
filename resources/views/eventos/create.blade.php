@extends('layouts.app')

@section('title', 'Novo Evento')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <section class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded-xl shadow-sm ring-1 ring-slate-200">
        <h2 class="text-2xl font-bold text-slate-900">Cadastrar Novo Evento</h2>
        <p class="text-slate-600 mt-1">Preencha as informações do workshop ou palestra para adicionar à agenda.</p>

        <!-- Exibição de erros de validação -->
        @if ($errors->any())
            <div class="mt-4 p-4 bg-rose-50 border border-rose-200 rounded-lg text-sm text-rose-700">
                <p class="font-semibold text-rose-800">Verifique os erros listados:</p>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/eventos" method="POST" class="mt-6 space-y-4">
            @csrf

            <div>
                <label for="titulo" class="block text-sm font-medium text-slate-700">Título do Evento</label>
                <input
                    type="text"
                    name="titulo"
                    id="titulo"
                    value="{{ old('titulo') }}"
                    placeholder="Ex: Semana da Tecnologia 2026"
                    class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                >
            </div>

            <div>
                <label for="local" class="block text-sm font-medium text-slate-700">Local de Realização</label>
                <input
                    type="text"
                    name="local"
                    id="local"
                    value="{{ old('local') }}"
                    placeholder="Ex: Auditório Principal, Lab 01, Online"
                    class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="vagas" class="block text-sm font-medium text-slate-700">Quantidade de Vagas</label>
                    <input
                        type="number"
                        name="vagas"
                        id="vagas"
                        value="{{ old('vagas') }}"
                        placeholder="Ex: 50"
                        class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                    >
                </div>

                <div>
                    <label for="preco_inscricao" class="block text-sm font-medium text-slate-700">Valor da Inscrição (R$)</label>
                    <input
                        type="number"
                        step="0.01"
                        name="preco_inscricao"
                        id="preco_inscricao"
                        value="{{ old('preco_inscricao', '0.00') }}"
                        placeholder="0.00"
                        class="mt-1 block w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                    >
                    <span class="text-xs text-slate-500 mt-1 block">Informe 0.00 para eventos gratuitos.</span>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="/eventos" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Cancelar
                </a>
                <button type="submit" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                    Salvar Evento
                </button>
            </div>
        </form>
    </section>
@endsection