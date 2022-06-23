<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Domowe Zadania</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
@include('partials/navigation')

<!-- Page Content -->
<div class="container">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
