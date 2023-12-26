<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [ArticleController::class, 'index']);

Route::get('/index', [ArticleController::class, 'index']);

Route::get('/novedades', [ArticleController::class, 'indexNovedades']); // ver todos los artículos de la categoría novedades

Route::view("/article/create", "crearArticulo")->name("article.create"); // formulario de creación de un artículo

Route::post('/article/create',
    [ArticleController::class, 'crearArticulo'])->name('article.create'); // Recibir los datos del formulario y crear el artículo

Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show'); // visualización artículo

Route::get('/{categoria}/{slug}', [ArticleController::class, 'showWithSlug'])->name('article.showWithSlug'); // visualización artículo a través de categorias. Se manda encima del otro show por que no de conflicto

Route::put('/article/edit/{id}', [ArticleController::class, 'update'])->name('article.update'); // procesar cambios artículo

Route::get('/article/edit/{id}', [ArticleController::class, 'editarArticulo'])->name('article.edit'); // edición articulo

Route::delete('/eliminarArticulo/{id}',
    [ArticleController::class, 'eliminarArticulo'])->name('article.delete'); // eliminación artículo

// Rutas de autenticación

Route::view("/login", "login")->name("login"); // formulario login

Route::view("/register", "register")->name("register"); // formulario nuevo usuario

Route::post('/register',
    [LoginController::class, 'register'])->name('register'); // procesar nuevo usuario

Route::post('/iniciarSesion',
    [LoginController::class, 'login'])->name('iniciarSesion'); // procesar login

Route::get('/logout)',
    [LoginController::class, 'logout'])->name('logout'); // cerrar sesión