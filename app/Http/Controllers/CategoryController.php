<?php

namespace App\Http\Controllers;

use App\Models\Categories;

class CategoryController extends Controller
{

    public function showNovedades()
    {
        $novedadesCategory = Categories::where('name', 'Novedades')->first();

        if ($novedadesCategory) {
            abort(404);
        }
        $articles = $novedadesCategory->articles;
        return view('novedades.index', compact('articles'));
    }
}