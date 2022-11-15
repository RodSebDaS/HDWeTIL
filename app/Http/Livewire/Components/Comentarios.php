<?php

namespace App\Http\Livewire\Components;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Psy\VarDumper\Dumper;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpRecorder;

class Comentarios extends Component
{
  public $post;
  public $comentario;
  public $mensaje;

  public function mount($post)
  {
    $this->comentarios = $post->comentarios;
  }

  public function render(Post $post)
  {
    $comentarios =  $this->comentarios;
    $mensaje = $this->mensaje;

    return view('livewire.components.comentarios', compact('comentarios', 'mensaje'));
  }

  public function editarComentario($id, $mensaje)
  {
    $comentario = Comentario::find($id);
    dump($mensaje);
  }

}
