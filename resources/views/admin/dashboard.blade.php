@extends('layouts.app')

@section('title', 'Admin')

@section('content')
<section class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h2 class="text-3xl font-bold text-slate-900">Painel Administrativo</h2>
        <p class="text-slate-600">Resumo rápido do sistema para tomada de decisão.</p>
    </div>
    <a href="#" class="rounded-lg bg-slate-900 px-4 py-2 font-medium text-white hover:bg-slate-700">
        Novo registro
    </a>
</section>
<section class="mt-8 grid gap-4 md:grid-cols-3">
    <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Projetos ativos</p>
        <p class="mt-2 text-3xl font-bold text-slate-900">12</p>
    </article>
    <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Usuários cadastrados</p>
        <p class="mt-2 text-3xl font-bold text-slate-900">84</p>
    </article>
    <article class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Pendências</p>
        <p class="mt-2 text-3xl font-bold text-amber-600">5</p>
    </article>
</section>
<section class="mt-8 rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
    <h3 class="text-xl font-semibold text-slate-900">Registros recentes</h3>

    <div class="mt-4 overflow-x-auto">
        <table class="min-w-full border-collapse text-left">
            <thead>
                <tr class="border-b border-slate-200 text-sm text-slate-500">
                    <th class="py-3">Item</th>
                    <th class="py-3">Responsável</th>
                    <th class="py-3">Status</th>
                </tr>
            </thead>
            <tbody class="text-sm text-slate-700">
                <tr class="border-b border-slate-100">
                    <td class="py-3">Módulo de relatórios</td>
                    <td class="py-3">Equipe A</td>
                    <td class="py-3"><span class="rounded-full bg-emerald-100 px-3 py-1 text-emerald-700">Concluído</span></td>
                </tr>
                <tr class="border-b border-slate-100">
                    <td class="py-3">Cadastro de usuários</td>
                    <td class="py-3">Equipe B</td>
                    <td class="py-3"><span class="rounded-full bg-amber-100 px-3 py-1 text-amber-700">Em andamento</span></td>
                </tr>
                <tr>
                    <td class="py-3">Integração API externa</td>
                    <td class="py-3">Equipe C</td>
                    <td class="py-3"><span class="rounded-full bg-rose-100 px-3 py-1 text-rose-700">Atrasado</span></td>
                </tr>


{{-- Próximas aulas: Registros dinâmicos com Blade e Eloquent --}}
@php
    $users = App\Models\User::all();
@endphp
@foreach ($users as $user)
    <tr class="border-b border-slate-100">
        <td class="py-3 font-medium text-slate-900">{{ $user->name }}</td>
        <td class="py-3 text-slate-600">{{ $user->email }}</td>
        <td class="py-3 text-slate-500">{{ $user->created_at->format('d/m/Y') }}</td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection