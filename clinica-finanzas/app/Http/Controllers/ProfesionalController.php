<?php

namespace App\Http\Controllers;

use App\Models\Profesional;
use App\Models\TipoEspecialidad;
use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    public function index()
    {
        $profesionales = Profesional::with('tipoEspecialidad')->get();
        return view('profesionales.index', compact('profesionales'));
    }

    public function create()
    {
        $tipoEspecialidades = TipoEspecialidad::all();
        return view('profesionales.create', compact('tipoEspecialidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email|unique:profesionales,email',
            'tipoespecialidad_id' => 'required|exists:tipoespecialidades,id',
            'telefono' => 'required',
            'rut' => 'required|unique:profesionales,rut',
        ]);

        Profesional::create($request->all());

        return redirect()->route('profesionales.index')
                         ->with('success', 'Profesional creado correctamente.');
    }

    public function show(Profesional $profesional)
    {
        return view('profesionales.show', compact('profesional'));
    }

    public function edit(Profesional $profesional)
    {
        $tipoEspecialidades = TipoEspecialidad::all();
        return view('profesionales.edit', compact('profesional', 'tipoEspecialidades'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validación de datos
            $request->validate([
                'nombres' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email|unique:profesionales,email,' . $id,
                'tipoespecialidad_id' => 'required|exists:tipoespecialidades,id',
                'telefono' => 'required',
                'rut' => 'required|numeric|digits_between:9,10|unique:profesionales,rut,' . $id,
            ], [
                'rut.unique' => 'El RUT ya está registrado.',
                'email.unique' => 'El correo ya está registrado.',
                'rut.digits_between' => 'El RUT debe tener entre 9 y 10 dígitos sin puntos ni guion.',
                'telefono.required' => 'El teléfono es obligatorio.',
            ]);

            // Buscar al profesional por ID
            $profesional = Profesional::findOrFail($id);

            // Actualizar el profesional
            $profesional->update($request->all());

            // Redirigir con mensaje de éxito
            return redirect()->route('profesionales.index')
                             ->with('success', 'Profesional actualizado correctamente.');

        } catch (ValidationException $e) {
            // Redirigir con mensajes de error de validación
            return redirect()->back()
                             ->withErrors($e->validator)
                             ->withInput()
                             ->with('error', 'No se pudo actualizar el profesional. Por favor, corrige los errores y vuelve a intentar.');
        } catch (\Exception $e) {
            // Redirigir con mensaje de error genérico
            return redirect()->route('profesionales.index')
                             ->with('error', 'No se pudo actualizar el profesional. Inténtelo de nuevo.');
        }
    }

    public function destroy(Profesional $profesional)
    {
        $profesional->delete();

        return redirect()->route('profesionales.index')
                         ->with('success', 'Profesional eliminado correctamente.');
    }
}

