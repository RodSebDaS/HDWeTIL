<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Tipo;
use App\Models\Prioridade;
use App\Models\Servicio;
use App\Models\Activo;
use App\Models\Post;

class DetalleEdit extends Component
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
        $activos = Activo::all();
        return view('livewire.posts.detalle-edit', compact('post', 'tipos', 'prioridades', 'servicios', 'activos'));
    }
}
