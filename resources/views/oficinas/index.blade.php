<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Oficinas</title>
</head>
<body>
    <h1>Cadastro de Oficinas</h1>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif

    <form action="/oficinas" method="post">
        @csrf

        <label for="nome_oficina">Nome da oficina</label><br>
        <input type="text" id="nome_oficina" name="nome_oficina" required><br><br>

        <label for="professor_responsavel">Professor responsável</label><br>
        <input type="text" id="professor_responsavel" name="professor_responsavel" required><br><br>

        <label for="carga_horaria">Carga horária</label><br>
        <input type="number" id="carga_horaria" name="carga_horaria" required><br><br>

        <label for="turno">Turno</label><br>
        <input type="text" id="turno" name="turno" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <h2>Oficinas cadastradas</h2>

    @if ($oficinas->isEmpty())
        <p>Nenhuma oficina cadastrada.</p>
    @else
        <table border="1" cellpadding="6">
            <ul>
                @foreach ($oficinas as $oficina)
                    <li>
                        <strong>Oficina:</strong> {{ $oficina->nome_oficina }}<br>
                        <strong>Professor responsável:</strong> {{ $oficina->professor_responsavel }}<br>
                        <strong>Carga horária:</strong> {{ $oficina->carga_horaria }}<br>
                        <strong>Turno:</strong> {{ $oficina->turno }}<br><br>
                    </li>
                @endforeach
            </ul>
    @endif
</body>
</html>