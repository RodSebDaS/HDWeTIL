<?php

namespace App\Http\Controllers\Componente;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ProcesosPostsUser;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function show(Request $request, ProcesosPostsUser $post)
    {
        $referer = $request->headers->get('referer');
        //dd($referer);
        if (stristr($referer, 'solicitudes') || stristr($referer, 'otros')) {
            $post = $post->id;
            $pst = Post::find($post);
            if ($pst !== null) {
                $post = $pst;
                return view('historial.index', compact('post'));
            }
        } elseif (stristr($referer, 'post')) {
            //$post = $post->post_id;
            $post = $post->id;
            $pst = Post::find($post);
            if ($pst !== null) {
                $post = $pst;
                return view('historial.index', compact('post'));
            }
        }
    }
}
