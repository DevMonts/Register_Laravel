<!DOCTYPE html>
<html lang="pt-br" class="bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <nav class="black">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo">Olá, {{ Auth::user()->name ?? 'Visitante' }}! 👋</a>
            <ul id="nav-mobile" class="right">
                <li><a href="">🏠</a></li>
                <li><a href="">🛒</a></li>
            </ul>
        </div>
    </nav>
    <div class="row container">
        <div class="col s12 m3">
            @foreach ($products as $product)
            <div class="card">
                <div class="card-image">
                    <img src="images/sample-1.jpg">
                    <span class="card-title">Card Title</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">
                            add
                        </i></a>
                </div>
                <div class="card-content">
                    <p>
                        I am a very simple card. I am good at containing small bits of information. I am convenient
                        because I require little markup to use effectively.
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
