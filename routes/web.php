<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Auth\LoginController@showLoginForm');

// Route::get('/projetos', 'ProjetoController@index')->name('projetos');
Route::resource('projetos', 'ProjetoController')->middleware('auth');

Route::resource('clientes', 'ClienteController')->middleware('auth');

Route::resource('categorias', 'CategoriaController')->middleware('auth');

Route::resource('chamados', 'ChamadoController')->middleware('auth');

Route::resource('sla', 'SLAController')->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'HomeController@index')->name('home');

