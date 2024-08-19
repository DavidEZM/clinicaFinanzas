@extends('layouts.app')

@section('title', 'Listado de Atenciones')

@section('header', 'Atenciones')

@section('content')
    <a href="{{ route('atenciones.create') }}" class="btn btn-primary mb-3">Registrar Atención</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reserva</th>
                <th>Profesional</th>
                <th>Valor Atencion</th>
                <th>Pago Profesional</th>
                <th>Costo Insumos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atenciones as $atencion)
                <tr>
                    <td>{{ $atencion->id }}</td>
                    <td>{{ $atencion->reserva->paciente->nombres }} {{ $atencion->reserva->paciente->apellidos }}</td>
                    <td>{{ $atencion->reserva->profesional->nombres }} {{ $atencion->reserva->profesional->apellidos }}</td>
                    <td>{{ $atencion->valor_atencion }}</td>
                    <td>{{ $atencion->pago_profesional }}</td>
                    <td>{{ $atencion->costo_insumos }}</td>
                    <td>
                        <a href="{{ route('atenciones.show', $atencion->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('atenciones.edit', $atencion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('atenciones.destroy', $atencion->id) }}" method="POST" style="display:inline-block;">
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
