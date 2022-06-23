<nav class="navbar navbar-expand-lg static-top" xmlns:th="http://www.w3.org/1999/xhtml">
    <div class="container">
        <a class="navbar-brand" href="/">Domowa Lista Zadań</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pal.index') }}">DOMOWNICY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('task.index') }}">LISTA ZADAŃ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>