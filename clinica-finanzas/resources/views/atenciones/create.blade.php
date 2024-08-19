@extends('layouts.app')

@section('title', 'Registrar Atención')

@section('header', 'Registrar Atención')

@section('content')
    <form action="{{ route('atenciones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="reserva_id" class="form-label">Reserva</label>
            <select class="form-control" id="reserva_id" name="reserva_id" required>
                <option value="">Seleccione una reserva</option>
                @foreach($reservas as $reserva)
                    <option value="{{ $reserva->id }}">
                        Reserva #{{ $reserva->id }} - 
                        Paciente: {{ $reserva->paciente->nombre }} {{ $reserva->paciente->apellidos }} - 
                        Profesional: {{ $reserva->profesional->nombres }} {{ $reserva->profesional->apellidos }} - 
                        Especialidad: {{ $reserva->profesional->tipoEspecialidad->nombre_especialidad }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="valor_atencion" class="form-label">Valor Atencion</label>
            <input type="number" class="form-control" id="valor_atencion" name="valor_atencion" required>
        </div>
        <div class="mb-3">
            <label for="pago_profesional" class="form-label">Pago al Profesional</label>
            <input type="number" class="form-control" id="pago_profesional" name="pago_profesional" required>
        </div>
        <div class="mb-3">
            <label for="costo_insumos" class="form-label">Pago de Insumos</label>
            <input type="number" class="form-control" id="costo_insumos" name="costo_insumos" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('atenciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
