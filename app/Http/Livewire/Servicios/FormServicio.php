<?php

namespace App\Http\Livewire\Servicios;

use App\Models\Estado;
use App\Models\Puntaje;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormServicio extends Component
{
    public $servicio;
    public $accion = null;
   //public $votos = null;
    public $voto = null;

    public function render()
    {
        //$servicios = Servicio::all();
        $estados = Estado::where('id','>',8)->get();
        if ($this->servicio != null ) {
            $puntaje = Puntaje::where('servicio_id', $this->servicio->id ?? null)->get();
            //this->voto = $this->voto();
        } else {
            $puntaje = collect(['']);
        }
        return view('livewire.servicios.form-servicio', compact('estados','puntaje'));
    }

    public function puntuacion($value)
    {
        //dd($this->servicio->id );
        if ($this->servicio !== null ) {
            $voto = $this->voto();
            $token = $this->token();
            //dd($token);
            if ( count($token) > 0 == true || count($voto) > 0 == true ) { //Actualizo servicio si está califacado.
               /*  if ( $value !== null ) {
                    $puntaje = Puntaje::where('servicio_id', $this->servicio->id ?? null)
                    ->where('user_id', Auth::User()->id)->update(['servicio_id' =>  $this->servicio->id , 'calificacion' => $value]);
                    return back()->with('info', 'Gracias por su voto!');
                } */
                return back()->with('info', 'Solo puedes votar una vez. Gracias!');
            }elseif (count($token) > 0 == false || count($voto) > 0 == false) {

                //Creo un nuevo puntaje para el servicio, si no está califacado.
                Puntaje::create([
                    'post_id' => null,
                    'user_id' => Auth::User()->id,
                    'servicio_id' => $this->servicio->id,
                    'calificacion' => $value,
                    'observacion' => null,
                ]);
                return back()->with('info', 'Gracias por su voto!');
            }
        }
    }

    public function voto() //comprueba si el usuario ya calificó el servicio desde api.
    {
        $voto = Puntaje::where('servicio_id', $this->servicio->id)
            ->where('user_id', Auth::User()->id)
            ->get();
        return $voto;
    }
    
    public function token() //comprueba si el usuario ya calificó el servicio desde correo.
    {
        $token = Puntaje::where('servicio_id', $this->servicio->id)
            ->where('user_id', Auth::User()->id)
            ->where('token','!=',null)
            ->get();
        return $token;
    }
}
