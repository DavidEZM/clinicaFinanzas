<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        // Obtiene todos los registros de pacientes de la base de datos
        $pacientes = Paciente::all();

        // Retorna la vista 'pacientes.index' y pasa la lista de pacientes a la vista
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        // Retorna la vista 'pacientes.create' para mostrar el formulario de creación
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        try {
            // Validación de datos
            $request->validate([
                'nombres' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email|unique:pacientes,email',
                'telefono' => 'required',
                'rut' => 'required|numeric|digits_between:9,10|unique:pacientes,rut',
            ], [
                'rut.unique' => 'El RUT ya está registrado.',
                'email.unique' => 'El correo ya está registrado.',
                'rut.digits_between' => 'El RUT debe tener entre 9 y 10 dígitos sin puntos ni guion.',
                'telefono.required' => 'El teléfono es obligatorio.',
            ]);

            // Crear un nuevo paciente
            Paciente::create($request->all());

            // Redirigir con mensaje de éxito
            return redirect()->route('pacientes.index')
                             ->with('success', 'Paciente creado correctamente.');

        } catch (ValidationException $e) {
            // Redirigir con mensajes de error de validación
            return redirect()->back()
                             ->withErrors($e->validator)
                             ->withInput()
                             ->with('error', 'No se pudo crear el paciente. Por favor, corrige los errores y vuelve a intentar.');
        } catch (\Exception $e) {
            // Redirigir con mensaje de error genérico
            return redirect()->route('pacientes.index')
                             ->with('error', 'No se pudo crear el paciente. Inténtelo de nuevo.');
        }
    }

    public function show(Paciente $paciente)
    {
        // Retorna la vista 'pacientes.show' y pasa el objeto $paciente a la vista
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        // Retorna la vista 'pacientes.edit' y pasa el objeto $paciente a la vista
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validación de datos
            $request->validate([
                'nombres' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email|unique:pacientes,email,' . $id,
                'telefono' => 'required',
                'rut' => 'required|numeric|digits_between:9,10|unique:pacientes,rut,' . $id,
            ], [
                'rut.unique' => 'El RUT ya está registrado.',
                'email.unique' => 'El correo ya está registrado.',
                'rut.digits_between' => 'El RUT debe tener entre 9 y 10 dígitos sin puntos ni guion.',
                'telefono.required' => 'El teléfono es obligatorio.',
            ]);

            // Buscar al paciente por ID
            $paciente = Paciente::findOrFail($id);

            // Actualizar el paciente
            $paciente->update($request->all());

            // Redirigir con mensaje de éxito
            return redirect()->route('pacientes.index')
                             ->with('success', 'Paciente actualizado correctamente.');

        } catch (ValidationException $e) {
            // Redirigir con mensajes de error de validación
            return redirect()->back()
                             ->withErrors($e->validator)
                             ->withInput()
                             ->with('error', 'No se pudo actualizar el paciente. Por favor, corrige los errores y vuelve a intentar.');
        } catch (\Exception $e) {
            // Redirigir con mensaje de error genérico
            return redirect()->route('pacientes.index')
                             ->with('error', 'No se pudo actualizar el paciente. Inténtelo de nuevo.');
        }
    }

    public function destroy(Paciente $paciente)
    {
        // Elimina el paciente del registro de la base de datos
        $paciente->delete();

        // Redirige al usuario de vuelta a la lista de pacientes con un mensaje de éxito
        return redirect()->route('pacientes.index')
                         ->with('success', 'Paciente eliminado correctamente.');
    }
}

