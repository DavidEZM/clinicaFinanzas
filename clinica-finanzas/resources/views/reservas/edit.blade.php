@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Reserva</h1>
        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select class="form-select" id="paciente_id" name="paciente_id" required>
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ $paciente->id == $reserva->paciente_id ? 'selected' : '' }}>
                            {{ $paciente->nombres }} {{ $paciente->apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="profesional_id" class="form-label">Profesional</label>
                <select class="form-select" id="profesional_id" name="profesional_id" required>
                    @foreach($profesionales as $profesional)
                        <option value="{{ $profesional->id }}" {{ $profesional->id == $reserva->profesional_id ? 'selected' : '' }}>
                            {{ $profesional->nombres }} {{ $profesional->apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_reserva" class="form-label">Fecha de la Reserva</label>
                <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" value="{{ $reserva->fecha_reserva }}" required>
            </div>
            <div class="mb-3">
                <label for="hora_reserva">Hora de Reserva</label>
                <input type="time" class="form-control" id="hora_reserva" name="hora_reserva" value="{{ old('hora_reserva', $reserva->hora_reserva) }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
