<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovacontaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListasController;

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

Route::get('/login', [loginController::class, 'login'])->name("login");
Route::post('/login', [loginController::class, 'login'])->name("login");
// Route::get('/getlogin/', function(){
//     $login = Cliente::all();
//     echo json_encode($login);
// });

Route::get('/novaconta', [novacontaController::class, 'index'])->name('index');
Route::get('/novaconta/show/{id}', [novacontaController::class, 'show'])->where('id', '[0-9]+');
Route::get('/novaconta', [novacontaController::class, 'create'])->name("create");
Route::post('/novaconta/store', [novacontaController::class, 'store']);

Route::get('/listas', [listasController::class, 'index'])->name('index');
Route::get('/listas/show/{id}', [listasController::class, 'show'])->where('id', '[0-9]+');
Route::get('/listas', [listasController::class, 'create'])->name("create");
Route::post('/listas/store', [listasController::class, 'store']);
