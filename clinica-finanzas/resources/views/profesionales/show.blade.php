<!-- resources/views/profesionales/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Profesional</h1>

    <div class="card">
        <div class="card-header text-white bg-dark">
            Información del Profesional
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Nombres:</strong>
                <p>{{ $profesional->nombres }}</p>
            </div>
            <div class="mb-3">
                <strong>Apellidos:</strong>
                <p>{{ $profesional->apellidos }}</p>
            </div>
            <div class="mb-3">
                <strong>RUT:</strong>
                <p>{{ $profesional->rut }}</p>
            </div>
            <div class="mb-3">
                <strong>Correo Electrónico:</strong>
                <p>{{ $profesional->email }}</p>
            </div>
            <div class="mb-3">
                <strong>Especialidad:</strong>
                <p>{{ $profesional->tipoEspecialidad?->nombre_especialidad ?? 'Sin especialidad' }}</p>
            </div>
            <div class="mb-3">
                <strong>Teléfono:</strong>
                <p>{{ $profesional->telefono }}</p>
            </div>
        </div>
    </div>
    <!-- Botón para regresar a la lista de profesionales -->
    <a href="{{ route('profesionales.index') }}" class="btn btn-primary mt-3">Volver a la lista de Profesionales</a>
</div>
@endsection
