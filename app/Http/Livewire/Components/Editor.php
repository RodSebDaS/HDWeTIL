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
    public $content;
    public $post;

   /* public function mount(Post $post)
    {    }
   */
    public function render(Post $post)
    {
        $post = $this->post;
        return view('livewire.components.editor', compact('post'));
    }
}
