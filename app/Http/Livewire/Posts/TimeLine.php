<?php

namespace App\Http\Livewire\Posts;

use App\Models\ProcesosPostsUser;
use Livewire\Component;
use App\Models\Post;
use App\Models\Tipo;
use App\Models\Prioridade;
use App\Models\Estado;
use App\Models\FlujoValore;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\level;
use App\Models\Comentario;
use App\Models\Image;
use App\Models\ProcesosComentario;
use App\Models\ProcesosImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Server\DumpServer;
//use Livewire\WithFileUploads;

class TimeLine extends Component
{
    //use WithFileUploads;
    public $post; 
   
    public function render()
    {
        $post_id = $this->post;
        $pst = Post::find($post_id);
        $procesos = ProcesosPostsUser::with(['post.comentarios'])
        ->where('post_id','=',$post_id)
        ->orderBy('updated_at','asc')
        ->get();
        return view('livewire.posts.time-line', compact('procesos','pst'));
    }
}
