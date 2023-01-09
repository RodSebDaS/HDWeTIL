<?php

namespace App\Http\Livewire\Home;

use App\Models\Puntaje;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Respuesta extends Component
{
    public $post;
    public $voto;

    public function render()
    {
        $puntaje = Puntaje::where('post_id', $this->post->id ?? null)->get();
        $this->voto = $this->voto();
        return view('livewire.home.respuesta', compact('puntaje'));
    }

    public function puntuacion($value)
    {
        $voto = $this->voto();
        if ($voto !== null && count($voto)>0) {
            return back()->with('info', 'Solo una vez puede votar. Gracias!');
        } else {
            if ($value !== null) {
                Puntaje::create([
                    'post_id' => $this->post->id,
                    'user_id' => Auth::User()->id,
                    'servicio_id' => null,
                    'calificacion' => $value,
                    'observacion' => null,
                ]);
                return back()->with('info', 'Gracias por su voto!');
            }
        }
    }

    public function voto()
    {
        $voto = Puntaje::where('post_id', $this->post->id ?? null)
            ->where('user_id', Auth::User()->id)->get();
        return $voto;
    }
}
