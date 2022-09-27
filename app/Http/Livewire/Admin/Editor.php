<?php

namespace App\Http\Livewire\Admin;

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
        return view('livewire.admin.editor', compact('post'));
    }
}
