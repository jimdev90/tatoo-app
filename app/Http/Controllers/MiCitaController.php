<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\DB;
use App\Jobs\VerificarSolapamientoHorarios;
use Illuminate\Support\Facades\Bus;

class MiCitaController extends Controller
{


    public function store(Request $request)
    {


 
      
        $request->validate([
            'dni' => ['required'],
            'celular' => ['required'],
            'fecha' => ['required'],
            'hora' => ['required'],
            'tatuador' => ['required'],
        ]);

        $fecha = $request->fecha;
        $hora = $request->hora;
        $dni =  $request->dni;
        $celular = $request->celular;
        $tatuador = $request->tatuador;
        // CADA CITA DEMORARA 1 HORA MAXIMO
        $horatermino = date('H:i', strtotime($hora . ' + 1 hour'));

        Bus::dispatch(new VerificarSolapamientoHorarios($fecha, $hora, $horatermino,$dni,$celular,$tatuador));

        

     

            // $citas = DB::table('citas')
            // ->where('fecha', $fecha)
            // ->where(function ($query) use ($hora, $horatermino) {
            //     $query->where(function ($query) use ($hora, $horatermino) {
            //         $query->where('hora', '<', $horatermino)
            //               ->where('horatermina', '>', $hora);
            //     });
            // })
         
            // ->count();

            // if ($citas > 0) {
               
            //     return redirect()->back()->withErrors(['create' => 'Ya existe una reservación para la hora seleccionada, por favor seleccione para otra']);
            // } else {

                
            
      
            //     Cita::create([
            //         'id_user' => auth()->user()->id,
            //         'dni' => $request->dni,
            //         'celular' => $request->celular,
            //         'fecha' => $request->fecha,
            //         'hora' => $request->hora,
            //         'horatermina' => $horatermino,
            //         'tatuador_id' => $request->tatuador,
            //     ]);
        
            //     return Redirect::route('dashboard');
            // }
         
        
    

        
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
