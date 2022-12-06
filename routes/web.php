<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovacontaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ListasController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\ListaindividualController;
use App\Models\Usuario;

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
    return view('welcome');
});

Route::get('/login', [UsuariosController::class, 'login'])->name("login");
Route::post('/login', [UsuariosController::class, 'login'])->name("login");
Route::get('/getlogin/', function(){
    $login = Usuario::all();
    echo json_encode($login);
});

Route::get('/novaconta', [NovacontaController::class, 'index'])->name('index');
Route::get('/novaconta/show/{id}', [NovacontaController::class, 'show'])->where('id', '[0-9]+');
Route::get('/novaconta', [NovacontaController::class, 'create'])->name("create");
Route::post('/novaconta/store', [NovacontaController::class, 'store']);

Route::get('/listas', [listasController::class, 'index'])->name('index');
Route::get('/listas/show/{id}', [listasController::class, 'show'])->where('id', '[0-9]+');
Route::get('/listas', [listasController::class, 'create'])->name("create");
Route::post('/listas/store', [listasController::class, 'store']);
Route::get('/listas/', [listasController::class, 'listar'])->name("listar");
Route::get('/listas/{id}', [listasController::class, 'storelistagem'])->name("listagem");
Route::get('/listas/{id}', [listasController::class, 'showindividual'])->name("listagemindividual");

Route::get('/itens', [ItensController::class, 'index'])->name('index');
Route::get('/itens/show/{id}', [ItensController::class, 'show'])->where('id', '[0-9]+');
Route::get('/itens', [ItensController::class, 'create'])->name("create");
Route::post('/itens/store', [ItensController::class, 'store']);





