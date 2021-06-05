<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CountriesController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios', function () {
    return Inertia::render('Usuarios');
})->name('usuarios');



Route::get('/listUsuarios',[UsersController::class,'index'])->name('usuarios.index');
Route::get('/usuarios/{user}',[UsersController::class,'show'])->name('usuarios.show');
Route::put('/usuarios/{user}',[UsersController::class,'update'])->name('usuarios.update');
Route::delete('/usuarios/{user}',[UsersController::class,'destroy'])->name('destroy.index');

Route::get('/paises',[CountriesController::class,'index'])->name('paises.index');
Route::get('/paises/{id}',[CountriesController::class,'buscar'])->name('paises.buscar');




Route::get('/ciudades/{id}',[CitiesController::class,'buscar'])->name('ciudades.buscar');
Route::get('/tiempo/{c}/{p}',[TiempoController::class,'consulta'])->name('tiempo.consulta');