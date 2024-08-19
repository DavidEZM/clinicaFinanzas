@extends('layouts.app')

@section('title', 'Crear Paciente')

@section('header', 'Crear Paciente')

@section('content')
    <h2>Crear Paciente</h2>
    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
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
                    <td><input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus nombres" required></td>
                    <td><input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese sus apellidos" required></td>
                    <td><input type="number" class="form-control" id="rut" name="rut" placeholder="Ingrese su RUT sin puntos ni guion" required></td>
                </tr>
                <tr>
                    <th>Correo</th>
                    <th>Telefono</th>
                </tr>
                <tr>
                    <td><input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required></td>
                    <td><input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono" required></td>
                </tr>
            </tbody>
        </table>
        <br>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
