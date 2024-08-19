@extends('layouts.app')

@section('title', 'Listado de Reservas')

@section('header', 'Reservas')

@section('content')
    <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">Crear Reserva</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Rut Paciente</th>
                <th>Profesional</th>
                <th>Fecha Reserva</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->paciente->nombres }} {{ $reserva->paciente->apellidos }}</td>
                    <td>{{ $reserva->paciente->rut }}</td>
                    <td>{{ $reserva->profesional->nombres }} {{ $reserva->profesional->apellidos }}</td>
                    <td>{{ $reserva->fecha_reserva }}</td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
