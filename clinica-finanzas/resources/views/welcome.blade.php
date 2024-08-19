@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Bienvenido a la Clínica</h1>
    <p class="lead">Esta es una aplicación de gestión para clínicas.</p>
    <hr class="my-4">
    <p>Utiliza los menús de navegación para gestionar pacientes, profesionales, reservas y atenciones.</p>
    <a class="btn btn-primary btn-lg" href="{{ url('/reservas') }}" role="button">Ver Reservas</a>
</div>
@endsection
