<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\VacanteController;

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

Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas de Vacantes

Route::get('/vacantes', [VacanteController::class, 'index'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');
Route::post('/vacantes', [VacanteController::class, 'store'])->name('vacantes.store');


// Subir Imagenes

Route::post('/vacantes/imagen', [VacanteController::class, 'imagen'])->name('vacantes.imagen');
Route::post('/vacantes/borrarimagen', [VacanteController::class, 'borrarimagen'] )->name('vacantes.borrar');