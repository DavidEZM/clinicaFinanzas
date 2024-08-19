@extends('layouts.app')

@section('title', 'Crear Reserva')

@section('header', 'Crear Reserva')

@section('content')
    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <select class="form-control" id="paciente_id" name="paciente_id" required>
                <option value="">Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombres }} {{ $paciente->apellidos }} - {{ $paciente->rut }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="profesional_id" class="form-label">Profesional</label>
            <select name="profesional_id" class="form-control" required>
                <option value="">Seleccione un profesional</option>
                @foreach($profesionales as $profesional)
                    <option value="{{ $profesional->id }}">
                        {{ $profesional->nombres }} {{ $profesional->apellidos }} - {{ $profesional->tipoEspecialidad->nombre_especialidad }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_reserva" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
