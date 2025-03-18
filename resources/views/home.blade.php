<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script>
        function enableEdit(clientId) {
            document.getElementById('row-' + clientId).style.display = 'none';
            document.getElementById('edit-row-' + clientId).style.display = 'table-row';
        }

        function cancelEdit(clientId) {
            document.getElementById('row-' + clientId).style.display = 'table-row';
            document.getElementById('edit-row-' + clientId).style.display = 'none';
        }
    </script>
</head>

<body>
    <h1>Olá, {{ Auth::user()->name ?? 'Visitante' }}!</h1>
    <h2>Cadastre seu cliente:</h2>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="first_name" id="first_name" required>
        <label>Sobrenome:</label>
        <input type="text" name="last_name" id="last_name" required>
        <button type="submit">Cadastrar</button>
    </form>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    @if ($clients->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr id="row-{{ $client->id }}">
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->last_name }}</td>
                        <td>
                            <button onclick="enableEdit({{ $client->id }})">Editar</button>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    <tr id="edit-row-{{ $client->id }}" style="display: none;">
                        <form action="{{ route('clients.update', $client->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>{{ $client->id }}</td>
                            <td>
                                <input type="text" name="first_name" value="{{ $client->first_name }}" required>
                            </td>
                            <td>
                                <input type="text" name="last_name" value="{{ $client->last_name }}" required>
                            </td>
                            <td>
                                <button type="submit">Salvar</button>
                                <button type="button" onclick="cancelEdit({{ $client->id }})">Cancelar</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Sem Clientes</p>
    @endif
</body>

</html>
