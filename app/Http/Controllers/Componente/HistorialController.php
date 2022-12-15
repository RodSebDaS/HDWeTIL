<?php

namespace App\Http\Controllers\Componente;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ProcesosPostsUser;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function show(ProcesosPostsUser $post){
        
        $post = $post->post_id;
        
        $post = Post::find($post);
        if ($post !== null) {
            $post = $post;
        }
        //Ver softdelete
        return view('historial.index', compact('post'));
    }
}
