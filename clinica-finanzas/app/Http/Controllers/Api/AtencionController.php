<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Atencion;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    // Obtener todas las atenciones con datos de paciente y profesional
    public function index()
    {
        $atenciones = Atencion::with(['reserva.paciente', 'reserva.profesional'])->get();
        return response()->json($atenciones);
    }

    // Crear una nueva atencion
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'valor_atencion' => 'required|integer',
            'pago_profesional' => 'required|integer',
            'tipoinsumo_id' => 'required|exists:tipoinsumos,id',
            'descripcion_atencion' => 'required|string|max:255',
        ]);

        $atencion = Atencion::create($validatedData);
        $atencion->load(['reserva.paciente', 'reserva.profesional']);
        return response()->json($atencion, 201);
    }

    // Mostrar una atencion específica con datos de paciente y profesional
    public function show($id)
    {
        $atencion = Atencion::with(['reserva.paciente', 'reserva.profesional'])->findOrFail($id);
        return response()->json($atencion);
    }

    // Actualizar una atencion
    public function update(Request $request, $id)
    {
        $atencion = Atencion::findOrFail($id);

        $validatedData = $request->validate([
            'reserva_id' => 'sometimes|required|exists:reservas,id',
            'valor_atencion' => 'sometimes|required|integer',
            'pago_profesional' => 'sometimes|required|integer',
            'tipoinsumo_id' => 'sometimes|required|exists:tipoinsumos,id',
            'descripcion_atencion' => 'sometimes|required|string|max:255',
        ]);

        $atencion->update($validatedData);
        $atencion->load(['reserva.paciente', 'reserva.profesional']); 
        return response()->json($atencion);
    }

    // Eliminar una atencion
    public function destroy($id)
    {
        $atencion = Atencion::findOrFail($id);
        $atencion->delete();

        return response()->json(null, 204);
    }
}
