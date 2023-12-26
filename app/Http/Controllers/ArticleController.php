<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);

        // Pasamos los artículos a la vista
        return view('index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::with('categories')->find($id);

        if (!$article) {
            abort(404);
        }
        return view('articleShow', compact('article'));
    }

    public function crearArticulo(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'slug' => [
                'required',
                'alpha_dash', // Asegura que el slug solo contenga letras, números, guiones y guiones bajos
                Rule::unique('articles'), // Asegura que el slug sea único en la tabla 'articles'
            ],]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->setSlugAttribute($request->slug); //formato amigable en URL.

        $article->save();

        $categoriasSeleccionadas = $request->input('categorias', []);
        // cada uno de los checkboxes marcados. Si hay varias opciones crea registros para cada una.

        $article->categories()->attach($categoriasSeleccionadas);
        // se insertan como un nuevo registro en la tabla intermedia (pivot) 

        return redirect()->route('article.show', ['id' => $article->id]);

    }

    public function editarArticulo($id)
    {
        $article = Article::findOrFail($id);

        return view('editArticulo', compact('article'));
    }
    public function update(Request $request, $id)
    {

        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'slug' => [
                'required',
                'alpha_dash', // Asegura que el slug solo contenga letras, números, guiones y guiones bajos
                Rule::unique('articles')->ignore($id), // Asegura que el slug sea único en la tabla 'articles sin contar con el elemento actual'
            ]
        ]);

        $article->update($request->all());

        return redirect('index')->with('success', 'Artículo actualizado con éxito.');
    }
    public function eliminarArticulo($id)
    {
        $article = Article::find($id);
        var_dump($article);
        if ($article) {
            $article->delete();
            return redirect('index')->with('success', 'Artículo eliminado exitosamente.');
        } else {
            return redirect('index')->with('error', 'No se encontró el artículo.');
        }
    }

    public function indexNovedades()
    {
        // realizar la consulta directamente de los que tengan la categoria Novedades
        $articles = Article::whereHas('categories', function ($query) {
            $query->where('categories_id', 2);
        })->get();

        // Pasamos los artículos a la vista
        return view('novedades', compact('articles'));
    }

}