<?php

namespace App\Http\Controllers\Modulo;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use App\Models\Activo;
use App\Models\Estado;
use App\Models\Prioridade;
use App\Models\FlujoValore;
use App\Models\Post;
use App\Models\Persona;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Idn;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Comentarios;
use Livewire\Request as LivewireRequest;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Models\ProcesosPostsUser;
use Exception;
use Throwable;

class PostsController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        try {
            $ruta = Route::currentRouteName();
            if ($ruta == "posts.atendidas") {
                $estado = Estado::find(2);
                $estadoNombre = $estado->nombre;
            } elseif ($ruta == "posts.asignadas") {
                $estadoNombre = "Asignada";
            } elseif ($ruta == "posts.derivadas") {
                $estado = Estado::find(3);
                $estadoNombre = $estado->nombre;
            } elseif ($ruta == "posts.pendientes") {
                $estado = FlujoValore::find(7);
                $estadoNombre = $estado->nombre;
            } elseif ($ruta == "posts.cerradas") {
                $estado = Estado::find(4);
                $estadoNombre = $estado->nombre;
            }
            $tipo = Tipo::find(1);
            $tipoNombre = $tipo->nombre;
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return view('posts.index', compact('tipoNombre', 'estadoNombre', 'ruta'));
    }
    
    public function pendientes(){
        
        return view('posts.pendiente');
    }

    public function atender(Request $request, $post)
    {
        try {
            $post = Post::find($post);
            //Post
            $estado = Estado::find(2);
            $flujo = FlujoValore::find(2);
            $userActual = Auth::User()->id;
            $post->estado_id = $estado->id;
            $post->flujovalor_id = $flujo->id;
            $post->user_id_updated_at = $userActual;
            //$post->observacion = $request->get('observacion');
            $post->save();

            //Proceso
            //User_Created_at
            $user_created_at = User::find($post->user_id_created_at);
            $level_user_created_at = Role::where('name', '=', $user_created_at->current_rol)->pluck('level');
            $level_user_created_at = ( $level_user_created_at[0] ?? null);
            //User_Updated_at
            $user_updated_at = User::find($post->user_id_updated_at);
            $level_user_updated_at = Role::where('name', '=', $user_updated_at->current_rol)->pluck('level');
            $level_user_updated_at = ( $level_user_updated_at[0] ?? null);

            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'prioridad_id' => $post->prioridad_id,
                'estado_id' => $post->estado_id,
                'flujovalor_id' => $post->flujovalor_id,
                'sla' => $post->sla,
                'descripcion' => $post->descripcion,
                //'observacion' => $post->observacion,
                //user-created
                'role_user_created_at' => $user_created_at->current_rol,
                'user_id_created_at' => $user_created_at->id,
                'user_name_created_at' => $user_created_at->name,
                'user_email_created_at' => $user_created_at->email,
                'level_created_at' => $level_user_created_at,
                //user-updated
                'role_user_updated_at' => $user_updated_at->current_rol,
                'user_id_updated_at' => $user_updated_at->id,
                'user_name_updated_at' => $user_updated_at->name,
                'user_email_updated_at' => $user_updated_at->email,
                'level_updated_at' => $level_user_updated_at,
                //user-asignated
                'role_user_asignated_at' => null,
                'user_id_asignated_at' => null,
                'user_name_asignated_at' => null,
                'user_email_asignated_at' => null,
                'level_asignated_at' => null,
            ]);

        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return redirect()->route('solicitudes.edit', $post)->with('info', 'Solicitud atendida con éxito!');
    }

    public function derivar(Request $request, $post)
    {
        $request->validate(['usuarios' => 'required']);
        try {
            //Post
            $post = Post::find($post);
            $estado = Estado::find(3);
            $flujo = FlujoValore::find(1);
            $userActual = Auth::User()->id;
            $post->estado_id = $estado->id;
            $post->flujovalor_id = $flujo->id;
            $post->user_id_updated_at = $userActual;
            $post->activa = false;
            $post->observacion = $request->get('descripcion');
            $post->save();
           
            //Proceso
            //User_Created_at
            $user_created_at = User::find($post->user_id_created_at);
            $level_user_created_at = Role::where('name', '=', $user_created_at->current_rol)->pluck('level');
            $level_user_created_at = ( $level_user_created_at[0] ?? null);
            //User_Updated_at
            $user_updated_at = User::find($post->user_id_updated_at);
            $level_user_updated_at = Role::where('name', '=', $user_updated_at->current_rol)->pluck('level');
            $level_user_updated_at = ( $level_user_updated_at[0] ?? null);
           
            $users = $request->get('usuarios');
            if($users !== null){
                foreach ($users as $user) {
                    //User_Asignated_at
                    $user_asignated_at = User::find($user);
                    $level_user_asignated_at = Role::where('name', '=', $user_asignated_at->current_rol)->pluck('level');
                    $level_user_asignated_at = ( $level_user_asignated_at[0] ?? null);
                    
                    ProcesosPostsUser::create([
                        'post_id' => $post->id,
                        'titulo' => $post->titulo,
                        'tipo_id' => $post->tipo_id,
                        'prioridad_id' => $post->prioridad_id,
                        'estado_id' => $post->estado_id,
                        'flujovalor_id' => $post->flujovalor_id,
                        'sla' => $post->sla,
                        'descripcion' => $post->descripcion,
                        'observacion' => $post->observacion,
                        'activa' => $post->activa,
                        //user-created
                        'role_user_created_at' => $user_created_at->current_rol,
                        'user_id_created_at' => $user_created_at->id,
                        'user_name_created_at' => $user_created_at->name,
                        'user_email_created_at' => $user_created_at->email,
                        'level_created_at' => $level_user_created_at,
                        //user-updated
                        'role_user_updated_at' => $user_updated_at->current_rol,
                        'user_id_updated_at' => $user_updated_at->id,
                        'user_name_updated_at' => $user_updated_at->name,
                        'user_email_updated_at' => $user_updated_at->email,
                        'level_updated_at' => $level_user_updated_at,
                        //user-asignated
                        'role_user_asignated_at' => $user_asignated_at->current_rol,
                        'user_id_asignated_at' => $user_asignated_at->id,
                        'user_name_asignated_at' => $user_asignated_at->name,
                        'user_email_asignated_at' => $user_asignated_at->email,
                        'level_asignated_at' => $level_user_asignated_at,
                    ]);
                }
            }

            $grupos = $request->get('grupo');
            if ($grupos !== null) {
                //Proceso
                foreach ($grupos as $grupo) {
                    $grupo = Role::select('name')->where('id', '=', $grupos)->pluck('name');
                    $grupoUsers = User::where('current_rol', '=', $grupo)->get();
                    if ($grupoUsers !== null) {
                        foreach ($grupoUsers as $grupoUser) {
                            //User_Asignated_at
                            $user_asignated_at = User::find($grupoUser);
                            $level_user_asignated_at = Role::where('name', '=', $user_asignated_at->current_rol)->pluck('level');
                            $level_user_created_at = ( $level_user_created_at[0] ?? null);

                            ProcesosPostsUser::create([
                                'post_id' => $post->id,
                                'titulo' => $post->titulo,
                                'tipo_id' => $post->tipo_id,
                                'prioridad_id' => $post->prioridad_id,
                                'estado_id' => $post->estado_id,
                                'flujovalor_id' => $post->flujovalor_id,
                                'sla' => $post->sla,
                                'descripcion' => $post->descripcion,
                                'observacion' => $post->observacion,
                                'activa' => $post->activa,
                                //user-created
                                'role_user_created_at' => $user_created_at->current_rol,
                                'user_id_created_at' => $user_created_at->id,
                                'user_name_created_at' => $user_created_at->name,
                                'user_email_created_at' => $user_created_at->email,
                                'level_created_at' => $level_user_created_at,
                                //user-updated
                                'role_user_updated_at' => $user_updated_at->current_rol,
                                'user_id_updated_at' => $user_updated_at->id,
                                'user_name_updated_at' => $user_updated_at->name,
                                'user_email_updated_at' => $user_updated_at->email,
                                'level_updated_at' => $level_user_updated_at,
                                //user-asignated
                                'role_user_asignated_at' => $user_asignated_at->current_rol,
                                'user_id_asignated_at' => $user_asignated_at->id,
                                'user_name_asignated_at' => $user_asignated_at->name,
                                'user_email_asignated_at' => $user_asignated_at->email,
                                'level_asignated_at' => $level_user_asignated_at,
                            ]);
                        }
                    }
                }
            }
         
        } catch (Throwable $e) {

            //return $e->getMessage();

            return back()->withError($e->getMessage())->withInput();
        
        /*     $message = $e->getMessage();
            var_dump('Exception Message: '. $message);

            $code = $e->getCode();       
            var_dump('Exception Code: '. $code);

            $string = $e->__toString();       
            var_dump('Exception String: '. $string);
        
            exit; */
        }
        return redirect()->route('posts.derivadas')->with('info', 'Solicitud derivada con éxito!');
    }

    public function cerrar(Request $request, $post)
    {
        try {
            $respuesta = $request->get('checkCerrar');
            if ($respuesta == 1) {
                $estado = 4;
                $flujo = 4;
                $respuesta = 0;
            } else {
                $estado = 4;
                $flujo = 5;
                $respuesta = 1;
            }
            //Post
            $post = Post::find($post);
            $userActual = Auth::User()->id;
            $post->estado_id = $estado;
            $post->flujovalor_id = $flujo;
            $post->user_id_updated_at = $userActual;
            $post->observacion = $request->get('descripcion');
            $post->activa = $respuesta;
            $post->save();

            //Proceso
            //User_Created_at
            $user_created_at = User::find($post->user_id_created_at);
            $level_user_created_at = Role::where('name', '=', $user_created_at->current_rol)->pluck('level');
            $level_user_created_at = ( $level_user_created_at[0] ?? null);

            //User_Updated_at
            $user_updated_at = User::find($post->user_id_updated_at);
            $level_user_updated_at = Role::where('name', '=', $user_updated_at->current_rol)->pluck('level');
            $level_user_updated_at = ( $level_user_updated_at[0] ?? null);

            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'prioridad_id' => $post->prioridad_id,
                'estado_id' => $post->estado_id,
                'flujovalor_id' => $post->flujovalor_id,
                'sla' => $post->sla,
                'descripcion' => $post->descripcion,
                'activa' => $post->activa,
                //'observacion' => $post->observacion,
                //user-created
                'role_user_created_at' => $user_created_at->current_rol,
                'user_id_created_at' => $user_created_at->id,
                'user_name_created_at' => $user_created_at->name,
                'user_email_created_at' => $user_created_at->email,
                'level_created_at' => $level_user_created_at,
                //user-updated
                'role_user_updated_at' => $user_updated_at->current_rol,
                'user_id_updated_at' => $user_updated_at->id,
                'user_name_updated_at' => $user_updated_at->name,
                'user_email_updated_at' => $user_updated_at->email,
                'level_updated_at' => $level_user_updated_at,
                //user-asignated
                'role_user_asignated_at' => null,
                'user_id_asignated_at' => null,
                'user_name_asignated_at' => null,
                'user_email_asignated_at' => null,
                'level_asignated_at' => null,
            ]);
            //crear ruta y redireccionar a cerradas o solucionadas.index.
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }

        if ( $respuesta == 0) {
           // return redirect()->route('mensajes', $post);
           return redirect()->route('posts.cerradas')->with('info', 'Solicitud cerrada con éxito!');
        } else {
            return redirect()->route('posts.index')->with('info', 'Solicitud cerrada con éxito!');
        }
    }

    public function rechazar(Request $request, $post)
    {
        try {
            //Post
            $post = Post::find($post);
            $estado = Estado::find(6);
            $flujo = FlujoValore::find(6);
            $userActual = Auth::User()->id;
            $post->estado_id = $estado->id;
            $post->flujovalor_id = $flujo->id;
            $post->user_id_updated_at = $userActual;
            $post->activa = false;
            $post->observacion = $request->get('descripcion');
            $post->save();

            //Proceso
            //User_Created_at
            $user_created_at = User::find($post->user_id_created_at);
            $level_user_created_at = Role::where('name', '=', $user_created_at->current_rol)->pluck('level');
            $level_user_created_at = ( $level_user_created_at[0] ?? null);

            //User_Updated_at
            $user_updated_at = User::find($post->user_id_updated_at);
            $level_user_updated_at = Role::where('name', '=', $user_updated_at->current_rol)->pluck('level');
            $level_user_updated_at = ( $level_user_updated_at[0] ?? null);

            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'prioridad_id' => $post->prioridad_id,
                'estado_id' => $post->estado_id,
                'flujovalor_id' => $post->flujovalor_id,
                'sla' => $post->sla,
                'descripcion' => $post->descripcion,
                //'observacion' => $post->observacion,
                'activa' => $post->activa,
                //user-created
                'role_user_created_at' => $user_created_at->current_rol,
                'user_id_created_at' => $user_created_at->id,
                'user_name_created_at' => $user_created_at->name,
                'user_email_created_at' => $user_created_at->email,
                'level_created_at' => $level_user_created_at,
                //user-updated
                'role_user_updated_at' => $user_updated_at->current_rol,
                'user_id_updated_at' => $user_updated_at->id,
                'user_name_updated_at' => $user_updated_at->name,
                'user_email_updated_at' => $user_updated_at->email,
                'level_updated_at' => $level_user_updated_at,
                //user-asignated
                'role_user_asignated_at' => null,
                'user_id_asignated_at' => null,
                'user_name_asignated_at' => null,
                'user_email_asignated_at' => null,
                'level_asignated_at' => null,
            ]);
            //crear ruta y redireccionar a rechazadas/papelera o spams.index.
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return redirect()->route('solicitudes.show', $post)->with('info', 'Solicitud rechazada con éxito!');
    }
}
