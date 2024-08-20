<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\AtencionController;
use App\Http\Controllers\Api\ReservaController;

// Rutas de API para pacientes
Route::apiResource('pacientes', PacienteController::class);

// Rutas de API para Atenciones
Route::apiResource('atenciones', AtencionController::class);

// Rutas de API para Reserva
Route::apiResource('reserva', ReservaController::class);
