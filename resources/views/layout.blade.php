<?php
use Illuminate\Support\Facades\Auth;
if (!empty(Auth::user())) {
$name = Auth::user()->name;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Séries</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</head>


<body class="bg-dark">
    <nav class="navbar d-flex navbar-expand-lg navbar-light bg-light mb-2">

        <div class="container w-75">
            <a class="navbar navbar-brand" href="/series">Home</a>
            <ul class="nav">
                <li class="nav-item dropdown">
                    @auth
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item dabger text-danger" href="/sair">Sair</a>
                        </div>
                    @endauth
                    @guest
                        <a href="/entrar" class="btn btn-primary" type="button">
                            Entrar
                        </a>
                    @endguest
                </li>
            </ul>
        </div>
    </nav>
    <div class="container w-50">
        <div class="card bg-secondary" style="padding: 10px; margin: 10px 0">
            <h1 class="card-title text-white">@yield('cabecalho')</h1>
        </div>

        @yield('conteudo')
    </div>
</body>

</html>
