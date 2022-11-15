<?php

namespace App\Http\Livewire\Posts;

use App\Models\Activo;
use App\Models\Prioridade;
use App\Models\Servicio;
use App\Models\Post;
use App\Models\Tipo;
use App\Models\Estado;
use Livewire\Component;

class FormPost extends Component
{
    public $content;
    public Post $post;
    public $accion;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comentarios = $post->comentarios;
    }

    public function render(Post $post)
    {
        $post = $this->post;
        $accion = $this->accion;
        //$estado = Estado::find($post->estado_id);
        //$accion = $estado->nombre;
        $prioridades = Prioridade::all();
        $servicios = Servicio::all();
        $activos = Activo::all();
        $tipos = Tipo::all();
        $comentarios = $this->comentarios;
        return view('livewire.posts.form-post', compact('accion','post', 'tipos', 'prioridades', 'servicios', 'activos', 'comentarios'));
    }
}
