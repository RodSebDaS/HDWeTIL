<?php

namespace App\Http\Livewire\Components;

use App\Models\Activo;
use App\Models\Prioridade;
use App\Models\Servicio;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Editor extends Component
{
    public $descripcion;
    public $post;
    public $name;

    public function render(Post $post)
    {   
        /*$descripcion = $this->descripcion;
         if ($descripcion !== null) {
             $this->submit();
        } */
        $name = $this->name;
        $post = $this->post;
        return view('livewire.components.editor', compact('post','name'));
    }

    /*  public function submit()
    { 
        $post = $this->post;
        $post->descripcion = $this->descripcion;
        $post->save();
    }  */
}
