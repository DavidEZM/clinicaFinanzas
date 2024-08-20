<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Reserva;
use App\Models\TipoInsumo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AtencionController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $atenciones = Atencion::with(['reserva.paciente', 'reserva.profesional.tipoEspecialidad', 'tipoInsumo'])
            ->when($month && $year, function ($query) use ($month, $year) {
                $query->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month);
            })
            ->get();

        // Calcular los totales
        $total_pago_profesional = $atenciones->sum('pago_profesional');
        $total_costo_insumos = $atenciones->sum(fn($atencion) => $atencion->tipoInsumo->costo_insumo);
        $total_gastos = $total_pago_profesional + $total_costo_insumos;
        $total_ganancias_bruto = $atenciones->sum('valor_atencion');
        $total_ganancias_liquido = $total_ganancias_bruto - $total_gastos;

        return view('atenciones.index', compact('atenciones', 'total_gastos', 'total_ganancias_bruto', 'total_ganancias_liquido', 'month', 'year'));
    }

    public function create()
    {
        $reservas = Reserva::all();
        $tipoInsumos = TipoInsumo::all();
        return view('atenciones.create', compact('reservas', 'tipoInsumos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'valor_atencion' => 'required|numeric',
            'pago_profesional' => 'required|numeric',
            'tipoinsumo_id' => 'required|exists:tipoinsumos,id',
            'descripcion_atencion' => 'required'
        ]);

        Atencion::create($request->all());

        return redirect()->route('atenciones.index')
                         ->with('success', 'Atención registrada correctamente.');
    }

    public function show(Atencion $atencion)
    {
        $costo_insumo = $atencion->tipoInsumo->costo_insumo;
        $ganancia_atencion = $atencion->valor_atencion - ($atencion->pago_profesional + $costo_insumo);
        
        return view('atenciones.show', compact('atencion', 'ganancia_atencion'));
    }

    public function edit($id)
    {
        $atencion = Atencion::findOrFail($id);
        $reservas = Reserva::all();
        $tipoInsumos = TipoInsumo::all();

        return view('atenciones.edit', compact('atencion', 'reservas', 'tipoInsumos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reserva_id' => 'required|exists:reservas,id',
            'valor_atencion' => 'required|numeric',
            'pago_profesional' => 'required|numeric',
            'tipoinsumo_id' => 'required|exists:tipoinsumos,id',
            'descripcion_atencion' => 'nullable|string',
        ]);

        $atencion = Atencion::findOrFail($id);
        $atencion->update($request->all());

        return redirect()->route('atenciones.index')
                         ->with('success', 'Atención actualizada con éxito.');
    }

    public function destroy(Atencion $atencion)
    {
        $atencion->delete();

        return redirect()->route('atenciones.index')
                         ->with('success', 'Atención eliminada correctamente.');
    }
}
