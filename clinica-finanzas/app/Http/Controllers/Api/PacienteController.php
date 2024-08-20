<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paciente; // Asegúrate de importar el modelo Paciente
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Obtener todos los pacientes
    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }
 
    // Crear un nuevo paciente
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pacientes',
            'telefono' => 'required|integer',
            'rut' => 'required|integer|unique:pacientes',
        ]);
 
        $paciente = Paciente::create($validatedData);
 
        return response()->json($paciente, 201);
    }
 
    // Mostrar un paciente específico
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id, ['nombres', 'apellidos', 'email', 'telefono', 'rut']);
        return response()->json($paciente);
    }
 
    // Actualizar un paciente
    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
 
        $validatedData = $request->validate([
            'nombres' => 'sometimes|required|string|max:255',
            'apellidos' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:pacientes,email,'.$paciente->id,
            'telefono' => 'sometimes|required|integer',
            'rut' => 'sometimes|required|integer|unique:pacientes,rut,'.$paciente->id,
        ]);
 
        $paciente->update($validatedData);
        return response()->json($paciente);
    }
 
    // Eliminar un paciente
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
 
        return response()->json(null, 204);
    }
}
