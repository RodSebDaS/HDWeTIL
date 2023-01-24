<?php

namespace App\Http\Controllers\Componente;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post as ModelsPost;
use App\Models\ProcesosComentario;
use App\Models\User;
use FontLib\Table\Type\post;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
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
        //dd($request);
        $request->validate(['mensaje' => 'required']);
        $mensaje = $request->get('mensaje');
        if ($mensaje !== null) {

            $post_id = $request->get('post_id');
            $user_id = Auth()->User()->id;
            $user = User::find($user_id);
            
            $comentario = new Comentario();
            $comentario->post_id = $post_id;
            $comentario->user_id = $user_id;
            $comentario->mensaje = $mensaje;
            $comentario->calificacion = $request->get('calificacion');
            $comentario->save();
            ProcesosComentario::create([
                'post_id' => $comentario->post_id,
                'role_user_created_at' => $user->current_rol,
                'user_id_created_at' => $comentario->user_id,
                'user_name_created_at' => $user->name,
                'user_email_created_at' => $user->email,
                'role_user_updated_at' => $user->current_rol,
                'user_id_updated_at' => $comentario->user_id,
                'user_name_updated_at' => $user->name,
                'user_email_updated_at' => $user->email,
                'comentario_id' => $comentario->id,
                'mensaje' => $comentario->mensaje,
                'calificacion' => $comentario->calificacion,
            ]);
            return back()->with('success', 'Comentario enviado!');
        }
        return back();
    }

    public function show(Comentario $comentario)
    {
        //
    }

    public function edit(Request $request, Comentario $comentario)
    {  
        //dd($comentario);
        $comentarios = Comentario::find($comentario->id);
        $comentario->save();
        return back();
    }

    public function update(Request $request, $comentario)
    {
        //dd($request);
        $comentario = Comentario::find($comentario);
        $comentario->mensaje = $request->get('mensaje');
        $comentario->update();
        return back();
    }

    public function destroy($comentario)
    {
        //dd($comentario);
        if ($comentario != null) {
            $comentario = Comentario::find($comentario);
            $comentario->delete();
            return back()->with('info', 'Comentario eliminado con éxito!');
        }
    }
}
