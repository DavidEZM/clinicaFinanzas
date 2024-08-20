@extends('layouts.app')

@section('title', 'Registrar Atención')

@section('header', 'Registrar Atención')

@section('content')
    <form action="{{ route('atenciones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="reserva_id" class="form-label">Reserva</label>
            <select class="form-control" id="reserva_id" name="reserva_id" required>
                <option value="">Seleccione una reserva</option>
                @foreach($reservas as $reserva)
                    <option value="{{ $reserva->id }}">
                        Rut: {{ $reserva->paciente->rut }} - 
                        Paciente: {{ $reserva->paciente->nombres }} {{ $reserva->paciente->apellidos }} - 
                        Profesional: {{ $reserva->profesional->nombres }} {{ $reserva->profesional->apellidos }} - 
                        Especialidad: {{ $reserva->profesional->tipoEspecialidad->nombre_especialidad }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valor_atencion">Valor de Atención:</label>
            <input type="number" class="form-control" id="valor_atencion" name="valor_atencion" required oninput="calcularPagoProfesional()">
        </div>
        <div class="form-group">
            <label for="pago_profesional">Pago al Profesional (40%):</label>
            <input type="number" class="form-control" id="pago_profesional" name="pago_profesional" readonly>
        </div>
        <div class="mb-3">
            <label for="tipoinsumo_id">Tipo de Insumo</label>
            <select id="tipoinsumo_id" name="tipoinsumo_id" class="form-control" required>
                @foreach($tipoInsumos as $tipoInsumo)
                    <option value="{{ $tipoInsumo->id }}">{{ $tipoInsumo->tipo_insumo }} - ${{ $tipoInsumo->costo_insumo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="descripcion_atencion" class="form-label">Descripción Atención</label>
            <textarea class="form-control" id="descripcion_atencion" name="descripcion_atencion" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('atenciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

<script>
    function calcularPagoProfesional() {
        var valorAtencion = document.getElementById('valor_atencion').value;
        var pagoProfesional = valorAtencion * 0.4;
        document.getElementById('pago_profesional').value = pagoProfesional.toFixed(0); // Sin decimales
    }
</script>
