@extends('layouts.app')

@section('title', 'Listado de Profesionales')

@section('header', 'Profesionales')

@section('content')
    <a href="{{ route('profesionales.create') }}" class="btn btn-primary mb-3">Crear Profesional</a>
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
                <th>Rut</th>
                <th>Email</th>
                <th>Especialidad</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profesionales as $profesional)
                <tr>
                    <td>{{ $profesional->id }}</td>
                    <td>{{ $profesional->nombres }}</td>
                    <td>{{ $profesional->apellidos }}</td>
                    <td>{{ $profesional->rut }}</td>
                    <td>{{ $profesional->email }}</td>
                    <td>{{ $profesional->tipoEspecialidad->nombre }}</td>
                    <td>{{ $profesional->telefono }}</td>
                    <td>
                        <a href="{{ route('profesionales.show', $profesional->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('profesionales.edit', $profesional->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('profesionales.destroy', $profesional->id) }}" method="POST" style="display:inline-block;">
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
