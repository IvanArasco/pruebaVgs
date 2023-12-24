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

Route::view("/login", "login")->name("login"); // Para redirigir a la vista del login

Route::view("/register", "register")->name("register");

Route::view('/crearArticulo', 'crearArticulo')->name('crearArticulo');

Route::view('/editarArticulo', 'editarArticulo')->name('editarArticulo');

Route::post('/register',
    [LoginController::class, 'register'])->name('register'); // Para el method = post del formulario "registrar"

Route::post('/iniciarSesion',
    [LoginController::class, 'login'])->name('iniciarSesion');

Route::delete('/eliminarArticulo',
    [ArticleController::class, 'eliminarArticulo'])->name('eliminarArticulo');

Route::get('/logout)',
    [LoginController::class, 'logout'])->name('logout');

Route::get('/index', function () {
    return view('index');
});

Route::get('/novedades', function () {
    return view('novedades');
});

Route::get('/categoria', function () {
    return view('index');
});