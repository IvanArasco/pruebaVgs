<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prueba técnica VGS</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="antialiased">
    <div>
        @if (Route::has('login'))
        @auth
        <h2> Listado de productos de: {{Auth::user()->name}}</h2>
        <a href="{{ route('logout') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Cerrar
            sesión</a>
        @else
        <h2> Inicia sesión para ver tus productos</h2>
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar Sesión</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Crear
            cuenta</a>
        @endif

        @endauth
        @endif

    </div>

    <div class="container">
        <h2>Listado</h2>
        <!-- Comprobamos si hay artículos. Si los hay, los muestra -->
        @if (Route::has('articulos'))
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $articulo)
                <tr>
                    <td>{{ $articulo->id }}</td>
                    <td>{{ $articulo->nombre }}</td>
                    <td>
                        <form action="{{ route('editarArticulo', $article->id) }}" method="POST">
                            @csrf
                            @method('EDIT')
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                        <form action="{{ route('eliminarArticulo', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h2>No existen artículos, si quieres crearlos pulsa abajo</h2>
        <a href="{{ route('crearArticulo') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Crear
            Artículo</a>
        @endif
    </div>

</body>

</html>

</html>

</html>