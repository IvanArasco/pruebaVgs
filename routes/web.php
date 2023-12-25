<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/novedades', 'CategoryController@showNovedades')->name('novedades.index');

Route::get('/categoria/{slug}', function () {
    return view('index');
});

Route::get('/article/create', function () {
    return view('crearArticulo');
});

Route::view("/article/create", "crearArticulo")->name("article.create"); // formulario de creación de un artículo

Route::get('/article/{id}', 'ArticleController@show')->name('article.show'); // visualizar un artículo

Route::post('/article/create',
    [ArticleController::class, 'crearArticulo'])->name('article.create'); // recibir los datos del formulario y crear el artículo

Route::get('/article/editArticle/{id}', 'ArticleController@editarArticulo')->name('article.edit');

Route::put('/article/editArticle/{id}', 'ArticleController@update')->name('article.update');

Route::delete('/eliminarArticulo',
    [ArticleController::class, 'eliminarArticulo'])->name('eliminarArticulo');

Route::view("/login", "login")->name("login"); // Para redirigir a la vista del login

Route::view("/register", "register")->name("register");

Route::post('/register',
    [LoginController::class, 'register'])->name('register'); // Para el method = post del formulario "registrar"

Route::post('/iniciarSesion',
    [LoginController::class, 'login'])->name('iniciarSesion');

Route::get('/logout)',
    [LoginController::class, 'logout'])->name('logout');