@extends('layouts.app')

@section('title', 'Listado de Especialidades')

@section('header', 'Especialidades')

@section('content')
    <h2>Listado de Especialidades</h2>
    <a href="{{ route('tipoespecialidades.create') }}" class="btn btn-primary mb-3">Crear Especialidad</a>
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
