<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\Estado;

class SolicitudesIndex extends Component
{
    
    public function render()
    {
        $posts = Post::with(['Estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
        ->where('estado_id', '=', (Estado::first()->id))
        ->get();

        return view('livewire.admin.solicitudes-index', compact('posts'));
    }
}
