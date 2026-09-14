@extends('layouts.app')

@section('title', 'Agenda de Eventos')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Topo da Seção de Eventos -->
    <section class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-bold text-slate-900">Agenda de Eventos e Workshops</h2>
            <p class="text-slate-600 mt-1">Gerencie as palestras, semanas acadêmicas e atividades extracurriculares.</p>
        </div>
        <a href="/eventos/novo" class="rounded-lg bg-slate-900 px-4 py-2 font-medium text-white hover:bg-slate-700 transition-colors">
            Novo Evento
        </a>
    </section>

    <!-- Alerta de Sucesso (Flash Message) -->
    @if (session('sucesso'))
        <div class="mt-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="font-semibold">Sucesso:</span>
                <span>{{ session('sucesso') }}</span>
            </div>
        </div>
    @endif

    <!-- Barra de Filtro e Busca -->
    <section class="mt-6 bg-white p-4 rounded-xl shadow-sm ring-1 ring-slate-200">
        <form action="/eventos" method="GET" class="flex flex-wrap items-center gap-3">
            <div class="flex-1 min-w-[240px]">
                <input
                    type="text"
                    name="busca"
                    value="{{ $busca ?? '' }}"
                    placeholder="Pesquisar evento por título..."
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-900 placeholder-slate-400 focus:border-slate-500 focus:ring-1 focus:ring-slate-500 outline-none"
                >
            </div>
            <button type="submit" class="rounded-lg bg-slate-800 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">
                Filtrar
            </button>

            @if(!empty($busca))
                <a href="/eventos" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
                    Limpar Filtro
                </a>
            @endif
        </form>
    </section>

    <!-- Tabela Dinâmica de Eventos -->
    <section class="mt-6 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="border-b border-slate-200 px-6 py-4 flex justify-between items-center">
            <h3 class="font-semibold text-slate-800">Lista de Eventos</h3>
            <span class="text-xs bg-slate-100 text-slate-600 font-medium px-2.5 py-1 rounded-full">
                Total: {{ $eventos->count() }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs font-semibold uppercase text-slate-700">
                    <tr>
                        <th class="px-6 py-3">Código</th>
                        <th class="px-6 py-3">Título</th>
                        <th class="px-6 py-3">Local</th>
                        <th class="px-6 py-3">Vagas</th>
                        <th class="px-6 py-3">Inscrição</th>
                        <th class="px-6 py-3">Cadastro</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($eventos as $evento)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-slate-500">#{{ $evento->id }}</td>
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $evento->titulo }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full bg-slate-100 text-slate-700 px-2.5 py-0.5 text-xs font-medium">
                                    {{ $evento->local }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="rounded-full bg-indigo-50 text-indigo-700 px-2.5 py-0.5 text-xs font-medium">
                                    {{ $evento->vagas }} vagas
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-900">
                                @if($evento->preco_inscricao > 0)
                                    R$ {{ number_format($evento->preco_inscricao, 2, ',', '.') }}
                                @else
                                    <span class="rounded-full bg-emerald-50 text-emerald-700 px-2.5 py-0.5 text-xs font-medium">
                                        Gratuito
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-slate-500">
                                {{ $evento->created_at ? $evento->created_at->format('d/m/Y H:i') : 'Não informada' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                                @if(!empty($busca))
                                    Nenhum evento encontrado para a busca "<strong class="text-slate-700">{{ $busca }}</strong>".
                                @else
                                    Nenhum evento cadastrado no momento.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection