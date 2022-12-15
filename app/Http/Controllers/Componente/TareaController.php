<?php

namespace App\Http\Controllers\Componente;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTarea;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Tarea $tarea)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, Post $post)
    {
        
    }

    public function update(Request $request, $post)
    {
        try {
            $request->validate(['nombre' => 'required']);
            $tarea = new Tarea();
            $tarea->nombre = $request->get('nombre');
            $tarea->descripcion = $request->get('descripcion');
            $tarea->save();
            $post = Post::find($post);
            $user_created_at = Auth::User()->id;
            $postTarea = new PostTarea();
            $postTarea->tarea_id = $tarea->id;
            $postTarea->post_id = $post->id;
            $postTarea->id_user_created_at = $post->user_id_updated_at;
            $postTarea->id_user_updated_at = $user_created_at;
            $postTarea->respuesta = $request->get('respuesta') ?? null;
            $postTarea->activa = $request->get('activa') ?? false;
            $postTarea->save();

        } catch (\Throwable $e) {
            return back()->withError($e->getMessage())->withInput();
        }
 
        return redirect()->back();
    }

    public function destroy(Tarea $tarea)
    {
        //dd($tarea);
    }
}
