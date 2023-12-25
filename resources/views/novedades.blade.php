<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prueba técnica VGS</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="antialiased">

    <h2> Listado de artículos del tipo: "Novedades" </h2>

    <div class="container mt-5">
        @if (Route::has('articulos'))
        <h2>Listado</h2>

        @foreach ($articles as $article)
        <h2> {{ $article->title}}</h2>
        <p> {{$article->content}}</p>
        </hr>
        @endforeach

        @else
        <h2>No existen artículos de esa categoría.</h2>
        @endif
    </div>

</body>

</html>

</html>

</html>