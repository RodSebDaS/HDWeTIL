<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Tipo;
use App\Models\Prioridade;
use App\Models\Servicio;
use App\Models\Activo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Post;

class Detalle extends Component
{
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comentarios = $post->comentarios;
    }

    public function render(Post $post)
    {
        //$post = $this->post;
        $tipos = Tipo::all();
        $prioridades = Prioridade::all();
        $servicios = Servicio::all();
        $activos = Activo::with(['marca:id,nombre','modelo:id,nombre'])->get();
        //dd($this->post);
        return view('livewire.posts.detalle', compact('post', 'tipos', 'prioridades', 'servicios', 'activos'));
    }
}
