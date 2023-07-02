<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with(['tatuador', 'user'])
            ->orderBy('id', 'desc')
            ->get();
        return Inertia::render('Cita/Index', [
            'citas' => $citas
        ]);
    }

    public function finalizar(Request $request)
    {
        Cita::where('id', $request->id)
            ->update([
                'estado' => 'FINALIZADO',
            ]);

        return Redirect::route('cita.index');
    }

    public function reporte(Request $request)
    {
        $cita = Cita::where('id', $request->id)
            ->with(['tatuador', 'user'])
            ->first();
        $usuario = auth()->user();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('report', compact('cita', 'usuario'));
        return $pdf->stream("cita-" .$cita->id . ".pdf");
    }
}
