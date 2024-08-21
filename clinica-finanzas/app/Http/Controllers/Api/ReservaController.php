<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Obtener todas las reservas
    public function index()
    {
        $reservas = Reserva::with(['paciente', 'profesional'])->get();
        return response()->json($reservas);
    }

    // Crear una nueva reserva
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'profesional_id' => 'required|exists:profesionales,id',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|date_format:H:i',
        ]);

        $reserva = Reserva::create($validatedData);
        $reserva->load(['paciente', 'profesional']);
        return response()->json($reserva, 201);
    }

    // Mostrar una reserva específica
    public function show($id)
    {
        $reserva = Reserva::with(['paciente', 'profesional'])->findOrFail($id);
        return response()->json($reserva);
    }

    // Actualizar una reserva
    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $validatedData = $request->validate([
            'paciente_id' => 'sometimes|required|exists:pacientes,id',
            'profesional_id' => 'sometimes|required|exists:profesionales,id',
            'fecha_reserva' => 'sometimes|required|date',
            'hora_reserva' => 'sometimes|required|date_format:H:i', 
        ]);

        $reserva->update($validatedData);
        $reserva->load(['paciente', 'profesional']);
        return response()->json($reserva);
    }

    // Eliminar una reserva
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return response()->json(null, 204);
    }
}
