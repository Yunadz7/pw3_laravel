<!DOCTYPE html>
<html>
<head>
    <title>Livros</title>
</head>
<body>

<h1>Cadastro de Livros</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form action="/livros" method="POST">
    @csrf

    <p>
        <input type="text"
               name="titulo"
               placeholder="Título">
    </p>

    <p>
        <input type="text"
               name="autor"
               placeholder="Autor">
    </p>

    <p>
        <input type="number"
               name="ano_publicacao"
               placeholder="Ano">
    </p>

    <button type="submit">
        Cadastrar
    </button>
</form>

<hr>

<h2>Livros cadastrados</h2>

@if($livros->count() > 0)

<ul>
    @foreach($livros as $livro)
        <li>
            {{ $livro->titulo }}
            -
            {{ $livro->autor }}
            -
            {{ $livro->ano_publicacao }}
        </li>
    @endforeach
</ul>

@else

<p>Nenhum livro cadastrado.</p>

@endif

</body>
</html>