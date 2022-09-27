<?php

namespace App\Http\Livewire\Admin;

use App\Models\Activo;
use App\Models\Prioridade;
use App\Models\Servicio;
use App\Models\Post;
use Livewire\Component;

class FormPost extends Component
{
    public $content;
    public Post $post;

    public function render(Post $post)
    {
        $prioridades = Prioridade::all();
        $servicios = Servicio::all();
        $activos = Activo::all();
        return view('livewire.admin.form-post', compact('post', 'prioridades','servicios','activos'));
    }
}
