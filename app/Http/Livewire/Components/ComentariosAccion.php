<?php

namespace App\Http\Livewire\Components;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ComentariosAccion extends Component
{
    public $post;
    public $comentarios;
    public $comentarios_antiguos;

    public function mount($post)
    {
    
       $this->comentarios = $post->comentarios;
       
    }

    public function render(Post $post)
    {

      $comentarios = $this->comentarios;
    //dd($post);
        return view('livewire.components.comentarios', compact('comentarios'));
    }
}
