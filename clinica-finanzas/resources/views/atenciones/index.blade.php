@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Atenciones</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('atenciones.index') }}" method="GET">
        <table class="table table-sm table-borderless">
            <thead>
                <tr>
                    <th class="p-2">Filtrar</th>
                    <th>
                        <select name="month" id="month" class="form-control">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ (request('month') ?? now()->month) == $i ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($i)->locale('es')->monthName }}
                                </option>
                            @endfor
                        </select>
                    </th>
                    <th>
                        <select name="year" id="year" class="form-control">
                            @for ($i = 2024; $i <= now()->year; $i++)
                                <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </th>
                    <th><button type="submit" class="btn btn-primary">Filtrar</button></th>
                </tr>
            </thead>
        </table>
    </form>
    <table class="table table-sm table-borderless">
        <thead>
            <tr class="table-dark">
                <th>ID</th>
                <th>Paciente</th>
                <th>Profesional</th>
                <th>Valor Atención</th>
                <th>Fecha/Hora Atencion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atenciones as $atencion)
                <tr>
                    <td>{{ $atencion->id }}</td>
                    <td>{{ $atencion->reserva->paciente->nombres }} {{ $atencion->reserva->paciente->apellidos }}</td>
                    <td>{{ $atencion->reserva->profesional->nombres }} {{ $atencion->reserva->profesional->apellidos }}</td>
                    <td>${{ $atencion->valor_atencion }}</td>
                    <td>{{ $atencion->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('atenciones.show', $atencion->id) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('atenciones.edit', $atencion->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('atenciones.destroy', $atencion->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <table class="table table-sm table-borderless">
        <thead>
            <th>Total Gastos</th>
            <th>Total Ganancias Brutas</th>
            <th>Total Ganancias Líquidas</th>
        </thead>
        <tbody>
            <tr>
                <td class="text-danger">${{ $total_gastos}}</td>
                <td>${{ $total_ganancias_bruto}}</td>
                <td class="text-success">${{ $total_ganancias_liquido}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
