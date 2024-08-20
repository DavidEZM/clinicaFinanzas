<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacienteController;

// Definir rutas de API para pacientes
Route::apiResource('pacientes', PacienteController::class);