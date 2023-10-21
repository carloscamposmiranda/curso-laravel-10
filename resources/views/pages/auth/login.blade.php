<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login - Sistema Gestão</title>
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('img/favicons/favicon-96x96.png') }}" sizes="96x96" type="image/png">
    <link rel="icon" href="{{ asset('img/favicons/favicon-72x72.png') }}" sizes="72x72" type="image/png">
    <link rel="icon" href="{{ asset('img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <img class="mb-4" src="{{asset('img/favicons/icon-128x128.png')}}" alt="" width="72">
            <h1 class="h3 mb-3 fw-normal">Insira seus dados</h1>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                <label for="email">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
                <label for="password">Senha</label>
            </div>
            
            <button class="w-100 btn btn-lg btn-primary" type="submit">Conectar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2023</p>
        </form>
    </main>


</body>

</html>
