<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MiCitaController extends Controller
{


    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'dni' => ['required'],
            'celular' => ['required'],
            'fecha' => ['required'],
            'hora' => ['required'],
            'tatuador' => ['required'],
        ]);

        $cita = Cita::where('estado', 'ACTIVO')
            ->where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->get();

//        dd($cita);

        if (count($cita) > 0){
            return redirect()->back()->withErrors(['create' => 'Ya existe una reservación para la hora seleccionada, por favor seleccione para otra']);
        }

        Cita::create([
            'id_user' => auth()->user()->id,
            'dni' => $request->dni,
            'celular' => $request->celular,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'tatuador_id' => $request->tatuador,
        ]);

        return Redirect::route('dashboard');
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required'],
        ]);

        $cita = Cita::where('estado', 'ACTIVO')
            ->where('id_user', '!=', auth()->user()->id)
            ->where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->get();

        if (count($cita) > 0){
            return redirect()->back()->withErrors(['create' => 'Ya existe una reservación para la hora seleccionada, por favor seleccione para otra']);
        }

        Cita::where('id', $request->id)->update([
            'dni' => $request->dni,
            'celular' => $request->celular,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
        ]);

        return Redirect::route('dashboard');
    }

    public function delete(Request $request)
    {
        Cita::where('id', $request->id)
            ->update([
                'estado' => 'ELIMINADO',
            ]);

        return Redirect::route('dashboard');
    }
}
