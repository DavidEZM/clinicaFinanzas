@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Reserva</h1>

        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <span>Reserva #{{ $reserva->id }}</span>
                <span>Fecha Reserva: {{ $reserva->fecha_reserva }}</span>
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-secondary">
                            <th colspan="4">Paciente</th>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <th>Rut</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                        </tr>
                        <tr>
                            <td>{{ $reserva->paciente->nombres }} {{ $reserva->paciente->apellidos }}</td>
                            <td>{{ $reserva->paciente->rut }} </td>
                            <td>{{ $reserva->paciente->email }} </td>
                            <td>{{ $reserva->paciente->telefono }} </td>
                        </tr>
                        <tr class="table-secondary">
                            <th colspan="4">Profesional</th>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <th>Rut</th>
                            <th>Especialidad</th>
                            <th>Telefono</th>
                        </tr>
                        <tr>
                            <td>{{ $reserva->profesional->nombres }} {{ $reserva->profesional->apellidos }}</td>
                            <td>{{ $reserva->profesional->rut }} </td>
                            <td>{{ $reserva->profesional->tipoEspecialidad->nombre_especialidad }} </td>
                            <td>{{ $reserva->profesional->telefono }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver a la lista de reservas</a>
            <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-primary">Editar</a>

            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de que desea eliminar esta reserva?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
@endsection
