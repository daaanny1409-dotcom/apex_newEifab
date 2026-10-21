<?php

use App\Http\Controllers\AcademicoController;
use App\Http\Controllers\Academico\BusquedaEstudianteController;
use App\Http\Controllers\ParPaisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ========================================
    // MÓDULOS REALES
    // ========================================
    Route::get('/academico', [AcademicoController::class, 'index'])->name('academico');

    // ========================================
    // PLACEHOLDERS (módulos por implementar)
    // ========================================
    //Route::get('/opciones-generales', fn() => view('welcome'))->name('opciones-generales');
    Route::get('/administrador', fn() => view('welcome'))->name('administrador');
    Route::get('/asistencia', fn() => view('welcome'))->name('asistencia');
    Route::get('/descriptores', fn() => view('welcome'))->name('descriptores');
    Route::get('/facturacion', fn() => view('welcome'))->name('facturacion');
    Route::get('/rrhh', fn() => view('welcome'))->name('rrhh');
    Route::get('/inventario', fn() => view('welcome'))->name('inventario');
    Route::get('/personal', fn() => view('welcome'))->name('personal');
    Route::get('/proyectos', fn() => view('welcome'))->name('proyectos');
    Route::get('/test', fn() => view('welcome'))->name('test');
    Route::resource('par-pais', ParPaisController::class)->names('par-pais');


// ========================================
// MÓDULO: GESTIÓN ACADÉMICA
// ========================================
Route::get('/academico', [AcademicoController::class, 'index'])->name('academico');

Route::prefix('academico')->name('academico.')->group(function () {
    Route::get('busqueda-estudiante', [BusquedaEstudianteController::class, 'index'])
        ->name('busqueda-estudiante.index');
    Route::get('busqueda-estudiante/{id}', [BusquedaEstudianteController::class, 'show'])
        ->name('busqueda-estudiante.show');
    Route::get('busqueda-estudiante/{id}/editar', [BusquedaEstudianteController::class, 'edit'])
        ->name('busqueda-estudiante.edit');
    Route::put('busqueda-estudiante/{id}', [BusquedaEstudianteController::class, 'update'])
        ->name('busqueda-estudiante.update');
    Route::get('busqueda-estudiante/{id}/pdf', [BusquedaEstudianteController::class, 'pdf'])
        ->name('busqueda-estudiante.pdf');
    Route::resource('curso-turno', \App\Http\Controllers\Academico\AcaCursoTurnoController::class)
    ->names('curso-turno')
    ->parameters(['curso-turno' => 'cursoTurno']);

});

});

require __DIR__.'/auth.php';