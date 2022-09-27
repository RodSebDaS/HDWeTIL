<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate(['mensaje' => 'required']);

        $comentario = new Comentario();
        $comentario->mensaje = $request->get('mensaje');
        $comentario->post_id = $request->get('post_id');
        $comentario->user_id =$request->get('user_id');
        $comentario->calificacion = $request->get('calificacion');
       
        /* $post = comentario::create($request->all());
        $post->comentarios()->sync($request->all()); */
        $comentario->save();
         return back();
    }

    public function show(Comentario $comentario)
    {
        //
    }
    
    public function edit($comentario)
    {
       
        $comentario = Comentario::find($comentario);
        $mensaje = $comentario->mensaje;
        $comentario->save();
        return back();
    }
    
    public function update(Request $request, $comentario)
    {
        $comentario = Comentario::find($comentario);
        $comentario->mensaje = $request->get('mensaje');
        $comentario->update();
        return back();
    }
    
    public function destroy($comentario)
    {
        $comentario = Comentario::find($comentario);
        $comentario->delete();
        return back();
    }
}
