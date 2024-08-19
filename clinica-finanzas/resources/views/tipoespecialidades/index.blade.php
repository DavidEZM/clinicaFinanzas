@extends('layouts.app')

@section('title', 'Listado de Especialidades')

@section('header', 'Especialidades')

@section('content')
    <a href="{{ route('tipoespecialidades.create') }}" class="btn btn-primary mb-3">Crear Especialidad</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoEspecialidades as $tipoEspecialidad)
                <tr>
                    <td>{{ $tipoEspecialidad->id }}</td>
                    <td>{{ $tipoEspecialidad->nombre_especialidad }}</td>
                    <td>
                        <a href="{{ route('tipoespecialidades.edit', $tipoEspecialidad->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('tipoespecialidades.destroy', $tipoEspecialidad->id) }}" method="POST" style="display:inline-block;">
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
