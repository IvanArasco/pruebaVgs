<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Proyecto Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="antialiased text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" style="margin-top: 20%">
                <div class=" card">
                    <h2 class="card-header">Creación de un Artículo</h2>

                    <div class="card-body">
                        <form method="POST" action="{{ route('article.create') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right"> Título: </label>
                                <div class="col-md-6">
                                    <input id=" title" type="title" class="form-control" name="title" required
                                        autocomplete="content" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Categoría:</label>
                                <div style="align-self: center">
                                    <input type="checkbox" name="categorias[]" value=1> Noticias
                                    <input type="checkbox" name="categorias[]" value=2> Novedades
                                    <input type="checkbox" name="categorias[]" value=3> Anuncios
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right"> Contenido: </label>

                                <div class="col-md-6">
                                    <input id="content" type="title" class="form-control" name="content" required
                                        autocomplete="content" autofocus>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right"> Slug: </label>

                                <div class="col-md-6">
                                    <input id="slug" type="title" class="form-control" name="slug" required
                                        autocomplete="slug" autofocus>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary center"> Enviar nuevo artículo
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>