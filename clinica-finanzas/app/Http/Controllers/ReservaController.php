<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\TipoEspecialidad;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['paciente', 'profesional'])->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $profesionales = Profesional::with('tipoEspecialidad')->get();
        
        return view('reservas.create', compact('pacientes', 'profesionales'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'profesional_id' => 'required|exists:profesionales,id',
            'fecha_reserva' => 'required|date',
        ]);

        Reserva::create($request->all());

        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva creada correctamente.');
    }

    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $pacientes = Paciente::all();
        $profesionales = Profesional::all();
        return view('reservas.edit', compact('reserva', 'pacientes', 'profesionales'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'profesional_id' => 'required|exists:profesionales,id',
            'fecha_reserva' => 'required|date',
        ]);

        $reserva->update($request->all());

        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva actualizada correctamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')
                         ->with('success', 'Reserva eliminada correctamente.');
    }
}
