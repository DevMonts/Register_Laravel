<!DOCTYPE html>
<html lang="pt-br" class="h-full bg-gray-900 text-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="h-full bg-gray-900 text-white">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">
                Login
            </h2>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/home" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-300">
                        Email
                    </label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-gray-800 px-3 py-1.5 text-white outline-none placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 sm:text-sm/6">
                    </div>
                </div>
                @if ($errors->has('email'))
                    <div class="text-red-500">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-300">
                            Senha
                        </label>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                            class="block w-full rounded-md bg-gray-800 px-3 py-1.5 text-white outline-none placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 sm:text-sm/6">
                    </div>
                </div>
                <div class="flex justify-center items-center mt-4">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-indigo-600">
                    <label for="remember" class="ml-2 text-sm text-gray-300">Lembrar-me</label>
                </div>
                @if ($errors->has('password'))
                    <div class="text-red-500">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:ring-2 focus-visible:ring-indigo-500">
                        Entrar
                    </button>
                </div>
            </form>
            <p class="mt-10 text-center text-sm/6 text-gray-400">
                Não tem uma conta?
                <a href="\registro" class="font-semibold text-indigo-500 hover:text-indigo-400">
                    Cadastre-se aqui.
                </a>
            </p>
        </div>
    </div>
</body>

</html>
