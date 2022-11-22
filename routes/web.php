<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PessoaController;
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
session_start();
Route::get('/', function () {
    return view('login');
});
Route::post('/', [UsuarioController::class, 'logar']);

Route::get('/painel/{id}', [UsuarioController::class, 'listar']);
Route::get('/painel/painel/sair/', [UsuarioController::class, 'sair_pessoa']);
Route::post('/painel/', [UsuarioController::class, 'criar_pessoa'])->name('painel.post');
Route::get('/painel/excluir/{id}/{id_usuario}', [UsuarioController::class, 'excluir_pessoa']);
Route::get('/painel/editar/{id}/{id_usuario}', [UsuarioController::class, 'editar_pessoa']);

Route::post('/painel/editar/', [UsuarioController::class, 'editar_pessoa_single'])->name('painel.editar.post');
//Route::post('/painel', [PessoaController::class, 'criar_pessoa'])->name('painel.post');