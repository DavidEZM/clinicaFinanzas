@extends('layouts.app')

@section('title', 'Crear Paciente')

@section('header', 'Crear Paciente')

@section('content')
    <form action="{{ route('pacientes.store') }}" method="POST">
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
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="number" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="mb-3">
            <label for="rut" class="form-label">Rut</label>
            <input type="number" class="form-control" id="rut" name="rut" required>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
