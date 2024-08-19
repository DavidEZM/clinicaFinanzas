@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Profesional</h2>
    <form action="{{ route('profesionales.update', $profesional->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $profesional->nombres }}" required placeholder="Ingrese los nombres del profesional">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $profesional->apellidos }}" required placeholder="Ingrese los apellidos del profesional">
        </div>
        <div class="mb-3">
            <label for="rut" class="form-label">RUT</label>
            <input type="text" class="form-control" id="rut" name="rut" value="{{ $profesional->rut }}" required placeholder="Ingrese el RUT del profesional">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $profesional->email }}" required placeholder="Ingrese el correo electrónico del profesional">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $profesional->telefono }}" required placeholder="Ingrese el teléfono del profesional">
        </div>
        <div class="mb-3">
            <label for="tipoespecialidad_id" class="form-label">Tipo de Especialidad</label>
            <select class="form-select" id="tipoespecialidad_id" name="tipoespecialidad_id" required>
                <option value="">Seleccione la especialidad</option>
                @foreach($tipoEspecialidades as $tipoEspecialidad)
                    <option value="{{ $tipoEspecialidad->id }}" {{ $profesional->tipoespecialidad_id == $tipoEspecialidad->id ? 'selected' : '' }}>
                        {{ $tipoEspecialidad->nombre_especialidad }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Profesional</button>
        <a href="{{ route('profesionales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
