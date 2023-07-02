<?php

namespace App\Jobs;
use App\Models\Cita;
use Illuminate\Support\Facades\Bus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


class VerificarSolapamientoHorarios implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $fecha;
    protected $horaInicio;
    protected $horaTermino;

    public function __construct($fecha, $horaInicio, $horaTermino,$dni,$celular,$tatuador)
    {
        $this->fecha = $fecha;
       
        $this->horaInicio = $horaInicio;
        $this->horaTermino = $horaTermino;
        $this->dni = $dni;
        $this->celular = $celular;
        $this->tatuador = $tatuador;
       
        $fecha = $this->fecha;
        $hora = $this->horaInicio;
        $horatermino =  $this->horaTermino;
       
        $citas = DB::table('citas')
            ->where('fecha', $fecha)
            ->where(function ($query) use ($hora, $horatermino) {
                $query->where(function ($query) use ($hora, $horatermino) {
                    $query->where('hora', '<', $horatermino)
                          ->where('horatermina', '>', $hora);
                });
            })
         
            ->count();
           

            if ($citas > 0) {
                // NO DISPONIBLE
                return redirect()->back()->withErrors(['create' => 'Ya existe una reservación para la hora seleccionada, por favor seleccione para otra']);
            } else {
    
                
                // SI DEPONIBLE
    
               
      
                Cita::create([
                    'id_user' => auth()->user()->id,
                    'dni' => '123123123',
                    'celular' => '123123123',
                    'fecha' => $this->fecha,
                    'hora' => $this->horaInicio,
                    'horatermina' => $horatermino,
                    'tatuador_id' => '1',
                ]);
        
                // return Redirect::route('dashboard');
            }
           
    }

    public function handle()

    {
      

       
    }
}

