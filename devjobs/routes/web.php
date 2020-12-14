<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\InicioController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\NotificacionesController;

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



Auth::routes(['verify' => true]);


//Rutas de Vacantes
// Rutas protegidas
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/vacantes', [VacanteController::class, 'index'])->name('vacantes.index');
    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');
    Route::post('/vacantes', [VacanteController::class, 'store'])->name('vacantes.store');
    Route::delete('/vacantes/{vacante}', [VacanteController::class, 'destroy'])->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
    Route::put('/vacantes/{vacante}', [VacanteController::class, 'update'])->name('vacantes.update');

    // Subir Imagenes
    Route::post('/vacantes/imagen', [VacanteController::class, 'imagen'])->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', [VacanteController::class, 'borrarimagen'])->name('vacantes.borrar');

    // Cambiar estado de la vacante
    Route::post('/vacantes/{vacante}', [VacanteController::class, 'estado'])->name('vacantes.estado');

    // Notificaciones
    Route::get('/notificaciones', NotificacionesController::class)->name('notificaciones');
});

// get one sin middleware de auth
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');

// Enviar datos para una vacante (cv nombre email)
Route::get('/candidatos/{id}',  [CandidatoController::class, 'index'])->name('candidatos.index');
Route::post('/candidatos/store', [CandidatoController::class, 'store'])->name('candidatos.store');

// Pagina de inicio
Route::get('/', InicioController::class)->name('inicio');
