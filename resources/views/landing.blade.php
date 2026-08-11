@extends('layouts.app')

@section('title', 'Landing Page do Projeto')

@section('content')
    
    
<section class="relative overflow-hidden rounded-3xl bg-slate-950 px-8 py-16 text-white shadow-2xl">
    <div class="absolute -right-16 -top-16 h-56 w-56 rounded-full bg-cyan-400/30 blur-3xl"></div>
    <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-fuchsia-500/20 blur-3xl"></div>

    <div class="relative z-10 max-w-3xl">
        <p class="inline-block rounded-full border border-cyan-300/40 bg-cyan-300/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-cyan-200">
            Solução Web Moderna
        </p>
        <h2 class="mt-6 text-4xl font-black leading-tight md:text-5xl">
            Transforme ideias em experiências digitais com alto nível visual
        </h2>
        <p class="mt-5 text-lg text-slate-200">
            Uma estrutura clara para apresentar proposta, funcionalidades e chamada para ação em uma única página.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="#funcionalidades" class="rounded-xl bg-cyan-400 px-6 py-3 font-semibold text-slate-900 hover:bg-cyan-300">Ver funcionalidades</a>
            <a href="#contato" class="rounded-xl border border-slate-500 px-6 py-3 font-semibold text-slate-100 hover:bg-slate-800">Falar com a equipe</a>
        </div>
    </div>
</section>
<section id="funcionalidades" class="mt-10">
    <div class="mb-5 flex items-end justify-between gap-4">
        <h3 class="text-2xl font-bold text-slate-900 md:text-3xl">Funcionalidades principais</h3>
        <p class="text-sm text-slate-500">Foco em clareza, desempenho e usabilidade</p>
    </div>

    <div class="grid gap-5 md:grid-cols-3">
        <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-cyan-600">Gestão</p>
            <h4 class="mt-2 text-xl font-bold text-slate-900">Painel inteligente</h4>
            <p class="mt-3 text-slate-600">Acompanhe indicadores em tempo real com navegação simples e objetiva.</p>
        </article>

        <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-emerald-600">Automação</p>
            <h4 class="mt-2 text-xl font-bold text-slate-900">Fluxos rápidos</h4>
            <p class="mt-3 text-slate-600">Reduza tarefas repetitivas com processos integrados e formulários eficientes.</p>
        </article>

        <article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-fuchsia-600">Dados</p>
            <h4 class="mt-2 text-xl font-bold text-slate-900">Relatórios visuais</h4>
            <p class="mt-3 text-slate-600">Visualize resultados com blocos claros para tomada de decisão mais segura.</p>
        </article>
    </div>
</section>
<section id="diferenciais" class="mt-10 grid gap-6 rounded-2xl bg-gradient-to-r from-slate-900 to-slate-800 p-8 text-white md:grid-cols-2">
    <div>
        <h3 class="text-2xl font-bold">Diferenciais da proposta</h3>
        <p class="mt-3 text-slate-200">
            Estrutura visual equilibrada, conteúdo bem organizado e foco em comunicação direta para qualquer público.
        </p>
    </div>

    <ul class="space-y-3 text-slate-100">
        <li class="rounded-lg border border-white/20 bg-white/5 px-4 py-3">Interface responsiva para desktop e celular</li>
        <li class="rounded-lg border border-white/20 bg-white/5 px-4 py-3">Componentes reutilizáveis e fáceis de manter</li>
        <li class="rounded-lg border border-white/20 bg-white/5 px-4 py-3">Design moderno com contraste e hierarquia visual</li>
    </ul>
</section>
<section id="contato" class="mt-10 rounded-2xl border border-slate-200 bg-white p-8 shadow-sm">
    <h3 class="text-2xl font-bold text-slate-900">Pronto para o próximo passo?</h3>
    <p class="mt-3 max-w-2xl text-slate-600">
        Apresente seu projeto com uma landing page bem estruturada e preparada para evoluir.
    </p>
    <div class="mt-6 flex flex-wrap gap-3">
        <a href="#" class="rounded-xl bg-slate-900 px-6 py-3 font-semibold text-white hover:bg-slate-700">Solicitar demonstração</a>
        <a href="#" class="rounded-xl border border-slate-300 px-6 py-3 font-semibold text-slate-700 hover:bg-slate-100">Ver documentação</a>
    </div>
</section>


@endsection