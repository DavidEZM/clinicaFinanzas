@extends('layouts.app')

@section('title', 'Listado de Profesionales')

@section('header', 'Profesionales')

@section('content')
    <h2>Listado de Profesionales</h2>
    <a href="{{ route('profesionales.create') }}" class="btn btn-primary mb-3">Crear Profesional</a>
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
    <table class="table table-sm table-striped">
        <thead>
            <tr class="table-dark">
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Rut</th>
                <th>Especialidad</th>
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
                    <td>{{ $profesional->tipoEspecialidad->nombre_especialidad }}</td>
                    <td>
                        <a href="{{ route('profesionales.show', $profesional->id) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eye"></i></a>
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
