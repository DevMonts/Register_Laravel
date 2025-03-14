<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    @vite('resources/css/app.css')
    <script>
        function enableEdit(clientId) {
            document.getElementById('row-' + clientId).classList.add('hidden');
            document.getElementById('edit-row-' + clientId).classList.remove('hidden');
        }
        function cancelEdit(clientId) {
            document.getElementById('row-' + clientId).classList.remove('hidden');
            document.getElementById('edit-row-' + clientId).classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Cadastro</h2>
        <form action="{{ route('clients.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium">Nome:</label>
                <input type="text" name="first_name" id="first_name" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block font-medium">Sobrenome:</label>
                <input type="text" name="last_name" id="last_name" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Cadastrar</button>
        </form>
        @if (session('success'))
            <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
        @if ($clients->isNotEmpty())
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Nome</th>
                        <th class="border px-4 py-2">Sobrenome</th>
                        <th class="border px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr id="row-{{ $client->id }}" class="bg-white border">
                            <td class="border px-4 py-2">{{ $client->id }}</td>
                            <td class="border px-4 py-2">{{ $client->first_name }}</td>
                            <td class="border px-4 py-2">{{ $client->last_name }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <button onclick="enableEdit({{ $client->id }})"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Editar</button>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"
                                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Deletar</button>
                                </form>
                            </td>
                        </tr>
                        <tr id="edit-row-{{ $client->id }}" class="hidden bg-gray-100">
                            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td class="border px-4 py-2">{{ $client->id }}</td>
                                <td class="border px-4 py-2">
                                    <input type="text" name="first_name" value="{{ $client->first_name }}" required
                                        class="w-full px-2 py-1 border rounded">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="text" name="last_name" value="{{ $client->last_name }}" required
                                        class="w-full px-2 py-1 border rounded">
                                </td>
                                <td class="border px-4 py-2 space-x-2">
                                    <button type="submit"
                                        class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">Salvar</button>
                                    <button type="button" onclick="cancelEdit({{ $client->id }})"
                                        class="bg-gray-500 text-white px-2 py-1 rounded hover:bg-gray-600">Cancelar</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">Sem Clientes</p>
        @endif
    </div>
</body>

</html>
