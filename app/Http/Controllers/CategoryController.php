<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function showWithSlug($slug)
    {
        // Obtener el articulo a traves del slug pasado como parámetro
        $article = Categories::with('articles')->where('slug', $slug);
        dd($article);
        if ($article) {
            // Obtén los artículos asociados a la categoría
            // $articles = $category->articles;
            return view('articleShow', ['article' => $article]);
        } else {
            return abort(404); // no hay artículos con ese slug.
        }
        // Recuperar el artículo a traves de la categoría y el slug
        //$category = Categories::where('categoria', $categoria)->where('slug', $article->slug)->firstOrFail();
        //$category = Categories::where('slug', $article->slug)->firstOrFail();
        // return view('articleShow', compact('article'));
    }
}