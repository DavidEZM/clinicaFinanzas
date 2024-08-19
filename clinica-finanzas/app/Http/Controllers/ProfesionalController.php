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

    public function update(Request $request, Profesional $profesional)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:profesionales,email,' . $profesional->id,
            'tipoespecialidad_id' => 'required|exists:tipoespecialidades,id',
            'telefono' => 'required',
            'rut' => 'required|unique:profesionales,rut',
        ]);

        $profesional->update($request->all());

        return redirect()->route('profesionales.index')
                         ->with('success', 'Profesional actualizado correctamente.');
    }

    public function destroy(Profesional $profesional)
    {
        $profesional->delete();

        return redirect()->route('profesionales.index')
                         ->with('success', 'Profesional eliminado correctamente.');
    }
}

