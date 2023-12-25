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
        @foreach ($articles as $article)

        <p>Nombre: {{ $article->title }}</p>
        <p> ID: {{ $article->id }}</p>
        Categorías:
        @foreach ($article->categories as $articleCategory)
        {{ $articleCategory->title}}
        @endforeach

        <p> Contenido: {{ $article->content }}</p>


        @endforeach
        </hr>

    </div>

</body>

</html>

</html>

</html>