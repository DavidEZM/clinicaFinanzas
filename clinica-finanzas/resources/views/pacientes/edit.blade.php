@extends('layouts.app')

@section('title', 'Editar Paciente')

@section('header', 'Editar Paciente')

@section('content')
    <h2>Editar Paciente</h2>
    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="table table-sm table-borderless">
            <thead>
                <tr class="table-dark">
                    <th colspan="3">Datos Paciente</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>RUT</th>
                </tr>
                <tr>
                    <td><input type="text" class="form-control" id="nombres" name="nombres" value="{{ $paciente->nombres }}" placeholder="Ingrese sus nombres" required></td>
                    <td><input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $paciente->apellidos }}" placeholder="Ingrese sus apellidos" required></td>
                    <td><input type="number" class="form-control" id="rut" name="rut" value="{{ $paciente->rut }}" placeholder="Ingrese su RUT sin puntos ni guion" required></td>
                </tr>
                <tr>
                    <th>Correo </th>
                    <th>Telefono</th>
                </tr>
                <tr>
                    <td><input type="email" class="form-control" id="email" name="email" value="{{ $paciente->email }}" placeholder="Ingrese su correo electrónico" required></td>
                    <td><input type="number" class="form-control" id="telefono" name="telefono" value="{{ $paciente->telefono }}" placeholder="Ingrese su número de teléfono" required></td>
                </tr>
            </tbody>
        </table>
        <br>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
