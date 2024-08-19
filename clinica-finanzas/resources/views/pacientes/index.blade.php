@extends('layouts.app')

@section('title', 'Listado de Pacientes')

@section('header', 'Pacientes')

@section('content')
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Crear Paciente</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Rut</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->nombres }}</td>
                    <td>{{ $paciente->apellidos }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>{{ $paciente->rut }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline-block;">
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
