<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Clientes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/contas">Contas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/importarcsv">Importar CSV<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <img src="https://www.sicredi.com.br/static/assets/novo/logo-cor.svg" alt="logo">
        </div>
    </nav>
    @yield('main')
    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/f53196eb90.js" crossorigin="anonymous"></script>
</body>
</html>