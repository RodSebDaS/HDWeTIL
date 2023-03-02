<?php

namespace App\Http\Livewire\Posts;

use App\Models\Estado;
use App\Models\ProcesosPostsUser;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Resumen extends Component
{
    public $post;

    public function render(Request $request)
    {
        $ruta = Route::getCurrentRoute();
        $ruta_solicitud = $ruta->solicitude;
        //$ruta_post = $ruta->post;
        $post = $this->post;
        $user_created = User::find($post->user_id_created_at);
        $user_created = $user_created->name;
        $tipo = Tipo::find($post->tipo_id);
        $estado = Estado::find($post->estado_id);
        $accion = $estado->nombre;

        if ($accion == 'Abierta') {
            $accion = $estado->nombre;
            $user_atencion = '-';
        } elseif ($accion == 'Atendida') {
            $userAtencion = $post->user_id_updated_at;
            $procesos = ProcesosPostsUser::with(['user:id,name'])
                ->where('post_id', '=', $post->id)
                ->where('user_id_updated_at', '=', $userAtencion)
                ->get()->last();
            if ($procesos !== null) {
                $user_atencion = $procesos->user_name_updated_at;
                $user_atencion  =  ($user_atencion ?? null);
               
                $accion = $estado->nombre;
            } else {
                $user = '-';
                $user_atencion = '-';
                $accion = $estado->nombre;
            }
        } elseif ($accion == 'Derivada') {
            $userAtencion = $post->user_id_updated_at;
            $procesos = ProcesosPostsUser::with(['user:id,name'])
                ->where('post_id', '=', $post->id)
                ->where('user_id_updated_at', '=', $userAtencion)
                ->get()->last();
            if ($procesos !== null) {
                if ($ruta_solicitud !== null) {
                    $user_atencion = $procesos->user_name_updated_at;
                } else {
                    $user_atencion = $procesos->user_name_asignated_at;
                }
                $accion = $estado->nombre;
            } else {
                $user_atencion = '-';
                $accion = $estado->nombre;
            }
        } elseif ($accion == 'Cerrada') {
            $userAtencion = $post->user_id_updated_at;
            $procesos = ProcesosPostsUser::with(['user:id,name'])
                ->where('post_id', '=', $post->id)
                ->where('user_id_updated_at', '=', $userAtencion)
                ->get()->last();
            if ($procesos !== null) {
                $user_atencion = $procesos->user_name_updated_at;
                $user_atencion  =  ($user_atencion ?? null);
                $accion = $estado->nombre;
            } else {
                $user_atencion = '-';
                $accion = $estado->nombre;
            }
        } elseif ($accion == 'Cancelada') {
            $userAtencion = $post->user_id_updated_at;
            $procesos = ProcesosPostsUser::with(['user:id,name'])
                ->where('post_id', '=', $post->id)
                ->where('user_id_updated_at', '=', $userAtencion)
                ->get()->last();
            if ($procesos !== null) {
                $user_atencion = $procesos->user_name_updated_at;
                $user_atencion  =  ($user_atencion ?? null);
                $accion = $estado->nombre;
            } else {
                $user_atencion = '-';
                $accion = $estado->nombre;
            }
        } elseif ($accion == 'Rechazada') {
            $userAtencion = $post->user_id_updated_at;
            $procesos = ProcesosPostsUser::with(['user:id,name'])
                ->where('post_id', '=', $post->id)
                ->where('user_id_updated_at', '=', $userAtencion)
                ->get()->last();
            if ($procesos !== null) {
                $user_atencion = $procesos->user_name_updated_at;
                $user_atencion  =  ($user_atencion ?? null);
                $accion = $estado->nombre;
            } else {
                $user_atencion = '-';
                $accion = $estado->nombre;
            }
        }
        return view('livewire.posts.resumen', compact('ruta_solicitud','accion', 'post', 'tipo', 'user_atencion', 'user_created'));
    }
}
