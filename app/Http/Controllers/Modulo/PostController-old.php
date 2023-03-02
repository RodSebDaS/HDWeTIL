<?php

namespace App\Http\Controllers\Modulo;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use App\Models\Activo;
use App\Models\Estado;
use App\Models\Prioridade;
use App\Models\FlujoValore;
use App\Models\Post;
use App\Models\ProcesosPostsUser;
use App\Models\ProcesosImage;
use App\Models\Persona;
use App\Models\Servicio;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Idn;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\Comentarios;
use App\Models\ProcesosComentario;
use Livewire\Request as LivewireRequest;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Exception;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Throwable;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:posts.index')->only('index');
        $this->middleware('can:posts.otros')->only('otros');
        $this->middleware('can:posts.show')->only('show');
        $this->middleware('can:posts.edit')->only('edit','posts.atender');
        $this->middleware('can:posts.update')->only('update','posts.atender',);
        $this->middleware('can:posts.destroy')->only('destroy');
    }

    public function index()
    {
        $ruta = FacadesRoute::currentRouteName();
        
        try {
            if ($ruta == "posts.index") {
                $tipo = Tipo::find(1);
                $tipoNombre = $tipo->nombre;
            } elseif ($ruta == "posts.otros") {
                $tipoNombre = "Post";
            }
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return view('posts.all', compact('tipoNombre', 'ruta'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($post)
    {
        try {
            //$ruta = Route::getCurrentRoute();
            //$solicitud = $ruta->solicitude;
            $post = ProcesosPostsUser::find($post);
            $post = $post->post_id;
            $post = Post::find($post);
            $estado = Estado::find($post->estado_id);
            $accion = $estado->nombre;
            if ($accion == 'Derivada') {
                $userAsigned = $post->user_id_updated_at;
                $userActual = Auth::User()->id;
                if ($userAsigned == $userActual) {
                    $accion = "Abierta";
                } else {
                    $accion = $estado->nombre;
                }
            } else {
                $accion = $estado->nombre;
            }
            $prioridades = Prioridade::all();
            $servicios = Servicio::all();
            $activos = Activo::all();
            $tipos = Tipo::all();
            $comentarios = $post->comentarios;
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return view('solicitudes.show', compact('accion', 'post', 'prioridades', 'servicios', 'activos', 'tipos', 'comentarios'));
    }

    public function edit($post)
    { 
        try {
            $post = ProcesosPostsUser::find($post);
            $post = $post->post_id;
            $post = Post::find($post);
            $estado = Estado::find($post->estado_id);
            $accion = $estado->nombre;
            if ($accion == 'Derivada') {
                $userAsigned = $post->user_id_updated_at;
                $userActual = Auth::User()->id;
                if ($userAsigned == $userActual) {
                    $accion = "Abierta";
                } else {
                    $accion = $estado->nombre;
                }
            } else {
                $accion = $estado->nombre;
            }
            $prioridades = Prioridade::all();
            $servicios = Servicio::all();
            $activos = Activo::all();
            $tipos = Tipo::all();
            $comentarios = $post->comentarios;
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return view('solicitudes.edit',  compact('accion', 'post', 'prioridades', 'servicios', 'activos', 'tipos', 'comentarios'));
    }

    public function update(Request $request, $post)
    {
        $data = $request->validate(['titulo' => 'required|min:15|max:255', 'sla' => 'required|date', 
            'descripcion' => 'required|min:15', 'prioridad_id' => 'required|not_in:Sin Asignar',
            'activo_id' => 'required|not_in:Sin Asignar', 'servicio_id' => 'required|not_in:Sin Asignar',
            'respuesta' => 'required|min:15']);
        try {
            $post = ProcesosPostsUser::find($post);
            $post = $post->post_id;
            $post = Post::find($post);
            //Post
                $userActual = Auth::User()->id;
                $post = Post::find($post);
                $post->titulo = $request->get('titulo');
                $post->tipo_id = $request->get('tipo_id');
                $post->prioridad_id = ($request->get('prioridad_id') ?? 1);
                $post->estado_id = $post->estado_id;
                $post->flujovalor_id =  $post->flujovalor_id;
                $post->servicio_id = $request->get('servicio_id');
                $post->activo_id = $request->get('activo_id');
                $post->sla = $request->get('sla');
                $post->descripcion = $request->get('descripcion');
                $post->respuesta = $request->get('respuesta');
                $post->observacion = $request->get('observacion')??'';
                $post->user_id_updated_at = $userActual;
                $post->activa = true;
                $post->save();
            //Imagen
                $imagenes_antiguas = $post->images->pluck('image_url')->toArray();
                $re_extractImages = '/src=["\']([^ ^"^\']*)/ims';
                preg_match_all($re_extractImages, $data['descripcion'], $matches);
                $imagenes_nuevas = $matches[1];
                foreach ($imagenes_nuevas as $image) {
                    $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);
                    $valor = array_search($image_url, $imagenes_antiguas);
                    if ($valor === false) {
                        $post->images()->create([
                            'image_url' => $image_url,
                        ]);
                        $imagen_id = $post->images->pluck('id');
                        //$imagen_id = (($imagen_id[0] !== null) ? $imagen_id[0] : null);
                        $imagen_id = ($imagen_id[0] ?? null);
                        if ($imagen_id !== null) {
                            ProcesosImage::create([
                                'post_id' => $post->id,
                                'imagen_id' => $imagen_id,
                                'image_url' => $image_url,
                            ]);
                        }
                    } else {
                        unset($imagenes_antiguas[$valor]);
                    }
                }
                foreach ($imagenes_antiguas as $image) {
                    Storage::delete($image);
                    $post->images()->where('image_url', $image)->delete();
                }
            //Comentarios
                $mensaje = $request->get('mensaje');
                $mensajeEdit = $request->get('mensajeEdit');
                if ($mensaje !== null) {
                    $comentario = new Comentario();
                    $comentario->post_id = $post->id;
                    $comentario->user_id =  Auth::User()->id;
                    $comentario->mensaje = $mensaje;
                    $comentario->calificacion = $request->get('calificacion');
                    $comentario->save();
                    ProcesosComentario::create([
                        'post_id' => $comentario->post_id,
                        'comentario_id' => $comentario->id,
                        'mensaje' => $comentario->mensaje,
                        'calificacion' => $comentario->calificacion,
                    ]);
                    return back();
                } /* elseif ($mensajeEdit !== null) {
                    $comentario = Comentario::find($comentario->id);
                    $comentario->mensaje = $mensajeEdit;
                    $comentario->post_id = $post->id;
                    $comentario->user_id =  Auth::User()->id;
                    $comentario->calificacion = $request->get('calificacion');
                    $comentario->update();
                    return back();
                } else {
                    $post->save();
                    return back();
                    return redirect()->route('posts.index')->with('info', 'Solicitud modificada con éxito!');
                } */

            //Proceso
                //User_Created_at
                    $user_created_at = User::find($post->user_id_created_at);
                    $level_user_created_at = Role::where('name', '=', $user_created_at->current_rol)->pluck('level');
                    //$level_user_created_at = (($level_user_created_at[0] !== null) ? $level_user_created_at[0] : null);
                    $level_user_created_at = ($level_user_created_at[0] ?? null);
                    //User_Updated_at
                    $user_updated_at = User::find($post->user_id_updated_at);
                    $level_user_updated_at = Role::where('name', '=', $user_updated_at->current_rol)->pluck('level');
                    $level_user_updated_at = ($level_user_updated_at[0] ?? null);

                //Servicio
                    $servicio_nombre = Servicio::where('id', '=', $post->servicio_id)->pluck('nombre');
                    //$servicio_nombre = ((($post->servicio_id !== null) ? $servicio_nombre[0] : ''));
                    $servicio_nombre = ($servicio_nombre[0] ?? 'Sin Asignar');

                //Activo
                    $activo_nombre = Activo::where('id', '=', $post->activo_id)->pluck('nombre');
                    //$activo_nombre = (($post->activo_id !== null) ? $activo_nombre[0] : '');
                    $activo_nombre = ($activo_nombre[0] ?? 'Sin Asignar');

                //Tipo
                    $tipo_nombre = Tipo::where('id', '=', $post->tipo_id)->pluck('nombre');
                    $tipo_nombre = ($tipo_nombre[0] ?? 'Sin Asignar');
                //Prioridad
                    $prioridad_nombre = Prioridade::where('id', '=', $post->prioridad_id)->pluck('nombre');
                    $prioridad_nombre = ($prioridad_nombre[0] ?? 'Sin Asignar');
                //Estado
                    $estado = Estado::find(7);
                    $estado_id =  $estado->id;
                //$estado_nombre = Estado::where('id', '=', 7)->pluck('nombre');
                //$estado_nombre = ($estado_nombre[0] ?? 'Sin Asignar');
                //Flujo Valor
                $flujovalor_nombre = FlujoValore::where('id', '=', $post->flujovalor_id)->pluck('nombre');
                $flujovalor_nombre = ($flujovalor_nombre[0] ?? 'Sin Asignar');

                ProcesosPostsUser::create([
                    'post_id' => $post->id,
                    'titulo' => $post->titulo,
                    'tipo_id' => $post->tipo_id,
                    'tipo_nombre' => $tipo_nombre,
                    'prioridad_id' => $post->prioridad_id,
                    'prioridad_nombre' => $prioridad_nombre,
                    'estado_id' => $estado_id,
                    'estado_nombre' => $estado->nombre,
                    'flujovalor_id' => $post->flujovalor_id,
                    'flujovalor_nombre' => $flujovalor_nombre,
                    'servicio_id' => $post->servicio_id,
                    'servicio_nombre' => $servicio_nombre,
                    'activo_id' =>  $post->activo_id,
                    'activo_nombre' => $activo_nombre,
                    'sla' => $request->get('sla'),
                    'descripcion' => $post->descripcion,
                    'respuesta' => $post->respuesta,
                    'observacion' => $post->observacion,
                    'activa' => $post->activa,
                    //user-created
                    /*'role_user_created_at' => $user_created_at->current_rol,
                    'user_id_created_at' => $post->user_id_created_at,
                    'user_name_created_at' => $user_created_at->name,
                    'user_email_created_at' => $user_created_at->email,
                    'level_created_at' => $level_user_created_at,*/
                    //user-updated
                    'role_user_updated_at' => $user_updated_at->current_rol,
                    'user_id_updated_at' => $post->user_id_updated_at,
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
            return $e->getMessage();
            //return back()->withError($e->getMessage())->withInput();
        }

        return redirect()->route('posts.atendidas')->with('info', 'Solicitud modificada con éxito!');
    }

    public function destroy($post)
    {
        try {
            $post = ProcesosPostsUser::find($post);
            $post = $post->post_id;
            $post = Post::find($post);
            $post->delete();
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return redirect()->route('posts.atendidas')->with('info', 'Solicitud eliminada con éxito!');
    }
}
