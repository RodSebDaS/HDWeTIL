<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comentarios extends Component
{
    public $post;
    
    public function mount($post)
    {
        $this->comentarios = $post->comentarios;
    }

    public function render(Comentario $comentarios)
    {
        return view('livewire.admin.comentarios');
    }
}
