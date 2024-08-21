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
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table table-sm">
        <thead>
            <tr class="table-dark">
                <th>ID</th>
                <th>Paciente</th>
                <th>Rut Paciente</th>
                <th>Profesional</th>
                <th>Fecha Reserva</th>
                <th>Hora Reserva</th>
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
                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->hora_reserva)->format('H:i') }}</td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva->id) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
