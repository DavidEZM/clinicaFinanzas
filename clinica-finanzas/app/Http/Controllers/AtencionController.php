<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Reserva;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    public function index()
    {
        $atenciones = Atencion::with(['reserva.paciente', 'reserva.profesional.tipoEspecialidad'])->get();
        
        return view('atenciones.index', compact('atenciones'));
    }

    public function create()
    {
        $reservas = Reserva::all();
        return view('atenciones.create', compact('reservas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'valor_atencion' => 'required|numeric',
            'pago_profesional' => 'required|numeric',
            'costo_insumos' => 'required|numeric',
        ]);

        Atencion::create($request->all());

        return redirect()->route('atenciones.index')
                         ->with('success', 'Atención registrada correctamente.');
    }

    public function show(Atencion $atencion)
    {
        return view('atenciones.show', compact('atencion'));
    }

    public function edit(Atencion $atencion)
    {
        $reservas = Reserva::all();
        return view('atenciones.edit', compact('atencion', 'reservas'));
    }

    public function update(Request $request, Atencion $atencion)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'valor_atencion' => 'required|numeric',
            'pago_profesional' => 'required|numeric',
            'costo_insumos' => 'required|numeric',
        ]);

        $atencion->update($request->all());

        return redirect()->route('atenciones.index')
                         ->with('success', 'Atención actualizada correctamente.');
    }

    public function destroy(Atencion $atencion)
    {
        $atencion->delete();

        return redirect()->route('atenciones.index')
                         ->with('success', 'Atención eliminada correctamente.');
    }
}
