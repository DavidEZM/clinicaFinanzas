<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\TipoEspecialidadController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AtencionController;

Route::get('/', function () {
    return view('welcome');
});

//Rutas para profesionales
Route::get('profesionales', [ProfesionalController::class, 'index'])->name('profesionales.index');
Route::get('profesionales/create', [ProfesionalController::class, 'create'])->name('profesionales.create');
Route::post('profesionales', [ProfesionalController::class, 'store'])->name('profesionales.store');
Route::get('profesionales/{profesional}', [ProfesionalController::class, 'show'])->name('profesionales.show');
Route::get('profesionales/{profesional}/edit', [ProfesionalController::class, 'edit'])->name('profesionales.edit');
Route::put('profesionales/{profesional}', [ProfesionalController::class, 'update'])->name('profesionales.update');
Route::delete('profesionales/{profesional}', [ProfesionalController::class, 'destroy'])->name('profesionales.destroy');

//Rutas para tipoespecialidades
Route::get('tipoespecialidades', [TipoEspecialidadController::class, 'index'])->name('tipoespecialidades.index');
Route::get('tipoespecialidades/create', [TipoEspecialidadController::class, 'create'])->name('tipoespecialidades.create');
Route::post('tipoespecialidades', [TipoEspecialidadController::class, 'store'])->name('tipoespecialidades.store');
Route::delete('tipoespecialidades/{tipoespecialidad}', [TipoEspecialidadController::class, 'destroy'])->name('tipoespecialidades.destroy');

//Rutas para reservas
Route::get('reservas', [ReservaController::class, 'index'])->name('reservas.index');
Route::get('reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
Route::post('reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('reservas/{reserva}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
Route::put('reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
Route::delete('reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');

//Rutas para atenciones
Route::get('atenciones', [AtencionController::class, 'index'])->name('atenciones.index');
Route::get('atenciones/create', [AtencionController::class, 'create'])->name('atenciones.create');
Route::post('atenciones', [AtencionController::class, 'store'])->name('atenciones.store');
Route::get('atenciones/{atencion}', [AtencionController::class, 'show'])->name('atenciones.show');
Route::get('atenciones/{atencion}/edit', [AtencionController::class, 'edit'])->name('atenciones.edit');
Route::put('atenciones/{atencion}', [AtencionController::class, 'update'])->name('atenciones.update');
Route::delete('atenciones/{atencion}', [AtencionController::class, 'destroy'])->name('atenciones.destroy');

//Rutas para pacientes
Route::get('pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::get('pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('pacientes/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');
Route::get('pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::delete('pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');