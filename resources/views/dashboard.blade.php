<!DOCTYPE html>
<html lang="pt-br" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form method="post" action="/registro">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h1 class="text-2xl font-semibold text-gray-900">Cadastrar Cliente</h1>
                <p class="mt-1 text-sm/6 text-gray-600">Preencha os dados do cliente.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Nome Completo</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>

                        @error('name')
                            <div>
                                <p class="error">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                        @error('email')
                            <div>
                                <p class="error">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Senha</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Confirmar Senha</label>
                        <div class="mt-2">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>
                @error('password')
                    <div>
                        <p class="text-red-500">{{ $message }}</p>
                    </div>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/login" class="text-sm/6 font-semibold text-gray-900">Logoff</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar Cliente</button>
        </div>
    </form>

</body>
</html>