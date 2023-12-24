<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function crearArticulo(Request $request)
    {

        //falta validación.
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->slug = $request->slug;

        $article->save();

        return redirect('index');
    }

    public function editarArticulo(Request $request, $id)
    {
        $article = Article::find($id);
    }

    public function eliminarArticulo(Request $request, $id)
    {
        $article = Article::find($id);

        $article->delete();
    }
}