@extends('layouts.app')

@section('title', 'Detalles de la Atención')

@section('header', 'Detalles de la Atención')

@section('content')
    <div class="card">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <span>Atención #{{ $atencion->id }}</span>
            <span>Fecha/Hora Atencion: {{ $atencion->created_at->format('d/m/Y H:i:s') }}</span>
        </div>
        <div class="card-body">
            <p><strong>Reserva:</strong></p>
            <ul>
                <li><strong>RUT Paciente:</strong> {{ $atencion->reserva->paciente->rut }}</li>
                <li><strong>Nombre Paciente:</strong> {{ $atencion->reserva->paciente->nombres }} {{ $atencion->reserva->paciente->apellidos }}</li>
                <li><strong>Profesional:</strong> {{ $atencion->reserva->profesional->nombres }} {{ $atencion->reserva->profesional->apellidos }}</li>
                <li><strong>Especialidad:</strong> {{ $atencion->reserva->profesional->tipoEspecialidad->nombre_especialidad }}</li>
                <li><strong>Descripcion:</strong> {{ $atencion->descripcion_atencion }}</li>
            </ul>
            <p>
                <strong class="text-success">Valor Atención:</strong> ${{ $atencion->valor_atencion }} | 
                <strong class="text-danger">Pago al Profesional:</strong> ${{ $atencion->pago_profesional }} |
                <strong class="text-danger">Costo Insumos:</strong> ${{$atencion->tipoInsumo->costo_insumo ?? 0 }}</td>
            </p>
            <p><strong>Ganancia de la Atención:</strong> ${{ $ganancia_atencion }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('atenciones.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('atenciones.edit', $atencion->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
@endsection
