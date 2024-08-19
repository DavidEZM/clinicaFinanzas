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

// Rutas para Pacientes
Route::resource('pacientes', PacienteController::class);

// Rutas para Profesionales
Route::resource('profesionales', ProfesionalController::class);

// Rutas para TipoEspecialidades
Route::resource('tipoespecialidades', TipoEspecialidadController::class);

// Rutas para Reservas
Route::resource('reservas', ReservaController::class);

// Rutas para Atenciones
Route::resource('atenciones', AtencionController::class);

