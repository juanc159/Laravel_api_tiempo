<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiempoController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
 
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    //usuarios

    Route::get('/usuarios',[UsersController::class,'index'])->name('usuarios.index');
    Route::get('/listUsuarios',[UsersController::class,'listUsuarios'])->name('usuarios.listUsuarios');
    Route::get('/usuarios/{user}',[UsersController::class,'show'])->name('usuarios.show');
    Route::put('/usuarios/{user}',[UsersController::class,'update'])->name('usuarios.update');
    Route::delete('/usuarios/{user}',[UsersController::class,'destroy'])->name('destroy.index');

    //comentarios
    Route::get('/usuario_comentario/{id}',[ComentariosController::class,'usuario_comentario'])->name('usuarios.usuario_comentario');
    
    Route::apiResource('/comentarios',ComentariosController::class);
    Route::get('/listComentarios',[ComentariosController::class,'listComentarios'])->name('usuarios.listComentarios');
    //home consulta del tiempo
    Route::get('/home',[HomeController::class,'index'])->name('home.index');

    
});


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});





Route::get('/paises',[CountriesController::class,'index'])->name('paises.index');
Route::get('/paises/{id}',[CountriesController::class,'buscar'])->name('paises.buscar');




Route::get('/ciudades/{id}',[CitiesController::class,'buscar'])->name('ciudades.buscar');
Route::get('/tiempo/{c}/{p}',[TiempoController::class,'consulta'])->name('tiempo.consulta');