<!DOCTYPE html>
<html lang="pt-br" class="h-full bg-gray-900 text-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
    @vite('resources/css/app.css')
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

<body class="h-full bg-gray-900 text-white">
    <div class="flex justify-between items-center p-4 bg-gray-800">
        <h2 class="text-2xl font-bold text-white">Olá, {{ Auth::user()->name ?? 'Visitante' }}! 👋</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 px-4 py-2 rounded text-white hover:bg-red-500">
                Logoff
            </button>
        </form>
    </div>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-xl">
            <h3 class="text-center text-lg text-gray-400">Cadastre seu cliente:</h3>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-xl">
            <form class="space-y-6" action="{{ route('clients.store') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-300">Nome:</label>
                    <input type="text" name="first_name" id="first_name" required
                        class="block w-full rounded-md border-gray-700 bg-gray-800 px-3 py-2 text-white outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300">Sobrenome:</label>
                    <input type="text" name="last_name" id="last_name" required
                        class="block w-full rounded-md border-gray-700 bg-gray-800 px-3 py-2 text-white outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-white shadow-md hover:bg-indigo-500">
                        ➕
                    </button>
                </div>
            </form>
            @if (session('success'))
                <div class="mt-4 p-3 bg-green-700 border border-green-500 text-white rounded">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-2xl">
        @if ($clients->isNotEmpty())
            <table class="w-full border-collapse border border-gray-700">
                <thead>
                    <tr class="bg-gray-800">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Nome</th>
                        <th class="border px-4 py-2">Sobrenome</th>
                        <th class="border px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr id="row-{{ $client->id }}" class="bg-gray-900 border-gray-700">
                            <td class="border px-4 py-2">{{ $client->id }}</td>
                            <td class="border px-4 py-2">{{ $client->first_name }}</td>
                            <td class="border px-4 py-2">{{ $client->last_name }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <button onclick="enableEdit({{ $client->id }})"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                                    ✏️
                                </button>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')"
                                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                        🗑️
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr id="edit-row-{{ $client->id }}" class="hidden bg-gray-800">
                            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td class="border px-4 py-2">{{ $client->id }}</td>
                                <td class="border px-4 py-2">
                                    <input type="text" name="first_name" value="{{ $client->first_name }}" required
                                        class="w-full px-2 py-1 border border-gray-600 bg-gray-700 text-white rounded">
                                </td>
                                <td class="border px-4 py-2">
                                    <input type="text" name="last_name" value="{{ $client->last_name }}" required
                                        class="w-full px-2 py-1 border border-gray-600 bg-gray-700 text-white rounded">
                                </td>
                                <td class="border px-4 py-2 space-x-2">
                                    <button type="submit"
                                        class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">
                                        💾
                                    </button>
                                    <button type="button" onclick="cancelEdit({{ $client->id }})"
                                        class="bg-gray-500 text-white px-2 py-1 rounded hover:bg-gray-600">
                                        ❌
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-400 text-center">Sem Clientes</p>
        @endif
    </div>
</body>

</html>
