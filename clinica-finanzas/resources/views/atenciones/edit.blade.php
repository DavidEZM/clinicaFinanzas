@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Atención</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('atenciones.update', $atencion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="reserva_id">Reserva</label>
            <select name="reserva_id" id="reserva_id" class="form-control" required>
                @foreach($reservas as $reserva)
                    <option value="{{ $reserva->id }}" {{ $atencion->reserva_id == $reserva->id ? 'selected' : '' }}>
                        {{ $reserva->paciente->nombres }} {{ $reserva->paciente->apellidos }} - {{ $reserva->profesional->nombres }} {{ $reserva->profesional->apellidos }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="valor_atencion">Valor de la Atención</label>
            <input type="text" name="valor_atencion" id="valor_atencion" class="form-control" value="{{ $atencion->valor_atencion }}" required oninput="calcularPagoProfesional()">
        </div>

        <div class="form-group">
            <label for="pago_profesional">Pago al Profesional</label>
            <input type="text" name="pago_profesional" id="pago_profesional" class="form-control" value="{{ $atencion->pago_profesional }}" required readonly>
        </div>

        <div class="form-group">
            <label for="tipoinsumo_id">Tipo de Insumo</label>
            <select name="tipoinsumo_id" id="tipoinsumo_id" class="form-control" required>
                @foreach($tipoInsumos as $tipoInsumo)
                    <option value="{{ $tipoInsumo->id }}" {{ $atencion->tipoinsumo_id == $tipoInsumo->id ? 'selected' : '' }}>
                        {{ $tipoInsumo->tipo_insumo }} - ${{ $tipoInsumo->costo_insumo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descripcion_atencion">Descripción de la Atención</label>
            <textarea name="descripcion_atencion" id="descripcion_atencion" class="form-control">{{ $atencion->descripcion_atencion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Atención</button>
    </form>
</div>
@endsection
<script>
    function calcularPagoProfesional() {
        var valorAtencion = document.getElementById('valor_atencion').value;
        var pagoProfesional = valorAtencion * 0.4;
        document.getElementById('pago_profesional').value = pagoProfesional.toFixed(0);
    }
</script>
