<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{

    public function index()
    {
        $articulos = Article::all();

        // Pasamos los artículos a la vista
        return view('articulos.index', ['articulos' => $articulos]);
    }

    public function show($id)
    {
        $article = Article::with('category')->find($id);

        if (!$article) {
            abort(404);
        }
        return view('article.show', $article);
    }

    public function crearArticulo(Request $request)
    {
        /*  $request->validate([
              'title' => 'required',
              'content' => 'required',
              'slug' => [
                  'required',
                  'alpha_dash', // Asegura que el slug solo contenga letras, números, guiones y guiones bajos
                  Rule::unique('articles', 'slug'), // Asegura que el slug sea único en la tabla 'articulos'
              ],]);
  */
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->setSlugAttribute($request->slug); //formato amigable en URL.
        $article->save();

        $categoriasSeleccionadas = $request->input('categorias', []); // cada uno de los checkboxes marcados. Si hay varias opciones crea registros para cada una.

        $article->categorias()->attach($categoriasSeleccionadas);
        // se insertan como un nuevo registro en la tabla intermedia (pivot) 

        return redirect('index');
    }

    public function editarArticulo(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        return view('editarArticulo', compact('article'));
    }
    public function actualizarArticulo(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        /* $request->validate([
             'title' => 'required|max:255',
             'content' => 'required',
             'slug' => 'required',
         ]);*/

        $article->update($request->all());

        return redirect('index')->with('success', 'Artículo actualizado con éxito.');
    }
    public function eliminarArticulo(Request $request, $id)
    {
        $article = Article::find($id);

        $article->delete();
    }
}