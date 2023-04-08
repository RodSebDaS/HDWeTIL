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
use Barryvdh\Debugbar\Twig\Extension\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Isset_;
use Symfony\Component\VarDumper\Server\DumpServer;
//use Livewire\WithFileUploads;

class TimeLine extends Component
{
    //use WithFileUploads;
    public $post;

    public function render(Request $request)
    {
        $post_id = $this->post;
        $referer = $request->headers->get('referer');
        if  (stristr($referer, 'solicitudes') || stristr($referer, 'otros')) {
            if ($post_id !== null) {
                $user_actual = Auth::User();
                $pst = Post::find($post_id);

                $procesos = ProcesosPostsUser::with(['post'])
                ->where('post_id', $post_id)
                ->get();

                $comentarios = ProcesosComentario::with(['post'])
                    ->where('post_id', $post_id)
                    ->orderBy('created_at', 'asc')
                    ->get();

                $observaciones = ProcesosPostsUser::with(['post'])
                    ->where('post_id', $post_id)
                    ->orderBy('created_at', 'asc')
                    ->get(); 
                    
                return view('livewire.posts.time-line', compact('pst', 'procesos', 'comentarios', 'observaciones'));
            }
            
        } elseif (stristr($referer, 'post')) {
            if ($post_id !== null) {
                $user_actual = Auth::User();
                $pst = Post::find($post_id);
                $procesos = ProcesosPostsUser::with(['post'])
                    ->where('post_id', $post_id)
                    ->get();
    
                $procesos = $procesos->sortBy([
                    ['procesos.post.created_at', 'asc'],
                ]);
                $procesos->values()->all();

                $comentarios = ProcesosComentario::with(['post'])
                    ->where('post_id', $post_id)
                    ->orderBy('created_at', 'asc')
                    ->get();

                $observaciones = ProcesosPostsUser::with(['post'])
                    ->where('post_id', $post_id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    
                return view('livewire.posts.time-line', compact('pst', 'procesos', 'comentarios', 'observaciones'));
            }
        }
    }
}
