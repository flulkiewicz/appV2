<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Start | Domowa Lista Zadań</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <div class="hero-img">
            <div class="hero-shadow"></div>
            <div class="hero-text">
                <h1>Witaj <span class="yellow-text">Domowniku</span></h1>
                <p>Jakie zadania dzisiaj przed Tobą?</p>
                <a class="btn btn-lg btn-outline-light" href="{{ route('task.index') }}">
                    Lista zadań
                </a>
                
            </div>
        </div>


    </header>


    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>