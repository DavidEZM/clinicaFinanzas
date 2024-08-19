@extends('layouts.app')

@section('title', 'Crear Especialidad')

@section('header', 'Crear Especialidad')

@section('content')
    <form action="{{ route('tipoespecialidades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_especialidad" class="form-label">Nombre de la Especialidad</label>
            <input type="text" class="form-control" id="nombre_especialidad" name="nombre_especialidad" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tipoespecialidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
