<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    @vite('resources/css/app.css')
</head>

<body>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <label for="first_name">Nome:</label>
        <input type="text" name="first_name" id="first_name" required>
        <br>
        <label for="last_name">Sobrenome:</label>
        <input type="text" name="last_name" id="last_name" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if (isset($clients) && $clients->count() > 0)
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
            </tr>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->first_name }}</td>
                    <td>{{ $client->last_name }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Nenhum Cliente</p>
    @endif
</body>

</html>
