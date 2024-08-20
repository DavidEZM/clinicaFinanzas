@extends('layouts.app')

@section('title', 'Crear Profesional')

@section('header', 'Crear Profesional')

@section('content')
    <form action="{{ route('profesionales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        <div class="mb-3">
            <label for="rut" class="form-label">Rut</label>
            <input type="number" class="form-control" id="rut" name="rut" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="mb-3">
            <label for="tipoespecialidad_id" class="form-label">Especialidad</label>
            <select class="form-control" id="tipoespecialidad_id" name="tipoespecialidad_id" required>
                <option value="">Seleccione una especialidad</option>
                @foreach($tipoEspecialidades as $tipoEspecialidad)
                    <option value="{{ $tipoEspecialidad->id }}">{{ $tipoEspecialidad->nombre_especialidad }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('profesionales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
