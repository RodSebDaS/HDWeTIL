<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
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
            if ($value !== null) {
               //actualizo puntaje
                $puntaje = Puntaje::where('post_id', $this->post->id ?? null)
                ->where('user_id', Auth::User()->id)->update(['calificacion' => $value]);
                //actualizo calificacion del post
                $puntajes = Puntaje::where('post_id', $this->post->id)->get();
                if ($puntajes->sum('calificacion') !== 0 && $puntajes->sum('calificacion') !== null){
                        $puntaje = round($puntajes->sum('calificacion') / $puntajes->count(), 2);
                        $post = Post::where('id', $this->post->id)->update(['calificacion' => $puntaje]);
                }else{
                    $puntaje = 0;
                    $post = Post::where('id', $this->post->id)->update(['calificacion' => $puntaje]);
                }
                return back()->with('info', 'Gracias por su voto!');
            }
            //return back()->with('info', 'Solo una vez puede votar. Gracias!');
        } else {
            if ($value !== null) {
                //creo puntaje
                Puntaje::create([
                    'post_id' => $this->post->id,
                    'user_id' => Auth::User()->id,
                    'servicio_id' => null,
                    'calificacion' => $value,
                    'observacion' => null,
                ]);
                //actualizo calificacion del post
                $puntajes = Puntaje::where('post_id', $this->post->id)->get();
                if ($puntajes->sum('calificacion') !== 0 && $puntajes->sum('calificacion') !== null){
                        $puntaje = round($puntajes->sum('calificacion') / $puntajes->count(), 2);
                        $post = Post::where('id', $this->post->id)->update(['calificacion' => $puntaje]);
                }else{
                    $puntaje = 0;
                    $post = Post::where('id', $this->post->id)->update(['calificacion' => $puntaje]);
                }
            
                return back()->with('info', 'Gracias por su voto!');
            }
        }
    }

    public function voto() //comprueba si el usuario ya calificó la respuesta del post.
    {
        $voto = Puntaje::where('post_id', $this->post->id ?? null)
            ->where('user_id', Auth::User()->id)->get();
        return $voto;
    }
}
