<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use App\Models\Puntaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class Respuesta extends Component
{
    public $post;
    public $voto;
    public $puntaje;
    public $valor;
    use WithPagination;

    public function render(Request $request)
    {
        //$pageName = $request->headers->get('referer');
        $this->puntaje = Puntaje::where('post_id', $this->post->id ?? null)->get();
        $this->voto = $this->voto();
        //$this->resetPage($pageName);
        return view('livewire.home.respuesta');
    }

    public function puntuacion(Request $request, $value)
    { 
        $voto = $this->voto();
        $this->valor = $value;
        if (count($voto)>0 == true) {
            /*  if ($value !== null) {
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
                } */ 
            back()->with('info', 'Solo puedes votar una vez. Gracias!');
        } elseif (count($voto)>0 == false) {
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
                        $votos = $puntajes->count();
                        $this->puntaje = round($puntajes->sum('calificacion') / $votos, 2);
                        $post = Post::where('id', $this->post->id)->update(['calificacion' => $this->puntaje, 'votos' => $votos]);
                }else{
                    $this->puntaje = 0;
                    $votos = $puntajes->count();
                    $post = Post::where('id', $this->post->id)->update(['calificacion' => $this->puntaje, 'votos' => $votos]);
                }
                back()->with('info', 'Gracias por su voto!');
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
