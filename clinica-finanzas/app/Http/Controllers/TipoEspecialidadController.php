<?php

namespace App\Http\Controllers;

use App\Models\TipoEspecialidad;
use Illuminate\Http\Request;

class TipoEspecialidadController extends Controller
{
    public function index()
    {
        $tipoEspecialidades = TipoEspecialidad::all();
        return view('tipoespecialidades.index', compact('tipoEspecialidades'));
    }

    public function create()
    {
        return view('tipoespecialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_especialidad' => 'required|unique:tipoespecialidades,nombre_especialidad',
        ]);

        TipoEspecialidad::create($request->all());

        return redirect()->route('tipoespecialidades.index')
                         ->with('success', 'Tipo de Especialidad creado correctamente.');
    }

    public function destroy(TipoEspecialidad $tipoEspecialidad)
    {
        $tipoEspecialidad->delete();

        return redirect()->route('tipoespecialidades.index')
                         ->with('success', 'Tipo de Especialidad eliminado correctamente.');
    }
}

