<?php

namespace App\Http\Controllers\Modulo;

use App\Events\PostEvent;
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
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;
use League\CommonMark\Node\Query\OrExpr;
use Nette\Utils\Validators;
use Throwable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Broadcasting\InteractsWithSocketstoOthers;
use Illuminate\Support\Facades\Cache;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:posts.index')->only('posts.index');
        $this->middleware('can:posts.atendidas')->only('posts.atendidas');
        $this->middleware('can:posts.derivadas')->only('posts.derivadas');
        $this->middleware('can:posts.pendientes')->only('posts.pendientes');
        $this->middleware('can:posts.asignadas')->only('posts.asignadas');
        $this->middleware('can:posts.cerradas')->only('posts.cerradas');
        $this->middleware('can:posts.atender')->only('posts.atender','posts.edit','solicitudes.show','solicitudes.update');
        $this->middleware('can:posts.derivar')->only('posts.derivar');
        $this->middleware('can:posts.cerrar')->only('posts.cerrar');
        $this->middleware('can:posts.rechazar')->only('posts.rechazar');
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
                //User_Attended_at
                $user_attended_at = $user_updated_at;
                $level_user_attended_at =  $level_user_updated_at;
                $level_user_attended_at = $level_user_updated_at;
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
                //Flujo Valor
                $flujovalor_nombre = FlujoValore::where('id', '=', $post->flujovalor_id)->pluck('nombre');
                $flujovalor_nombre = ($flujovalor_nombre[0] ?? 'Sin Asignar');

                $post->tipo_nombre = $tipo_nombre;
                $post->prioridad_nombre = $prioridad_nombre;
                $post->servicio_nombre = $servicio_nombre;
                $post->activo_nombre = $activo_nombre;
                $post->estado_nombre = $estado->nombre;
                $post->flujovalor_nombre = $flujovalor_nombre;
                //$post->user_name_created_at = $user_created_at->name;
                $post->user_name_updated_at = $user_updated_at->name;
                //$post->user_name_asignated_at = null;
                $post->save();

            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'tipo_nombre' => $tipo_nombre,
                'prioridad_id' => $post->prioridad_id,
                'prioridad_nombre' => $prioridad_nombre,
                'estado_id' => $post->estado_id,
                'estado_nombre' => $estado->nombre,
                'flujovalor_id' => $post->flujovalor_id,
                'flujovalor_nombre' => $flujovalor_nombre,
                'servicio_id' => $post->servicio_id,
                'servicio_nombre' => $servicio_nombre,
                'activo_id' =>  $post->activo_id,
                'activo_nombre' => $activo_nombre,
                'descripcion' => $post->descripcion,
                //'observacion' => $post->observacion,
                //user-created
                /*'role_user_created_at' => $user_created_at->current_rol,
                'user_id_created_at' => $user_created_at->id,
                'user_name_created_at' => $user_created_at->name,
                'user_email_created_at' => $user_created_at->email,
                'level_created_at' => $level_user_created_at,*/
                //user-updated
                'role_user_updated_at' => $user_updated_at->current_rol,
                'user_id_updated_at' => $user_updated_at->id,
                'user_name_updated_at' => $user_updated_at->name,
                'user_email_updated_at' => $user_updated_at->email,
                'level_updated_at' => $level_user_updated_at,
                //user-asignated
                /* 'role_user_asignated_at' => null,
                'user_id_asignated_at' => null,
                'user_name_asignated_at' => null,
                'user_email_asignated_at' => null,
                'level_asignated_at' => null, */
                //user-attended
                'role_user_attended_at' => $user_attended_at->current_rol,
                'user_id_attended_at' => $user_attended_at->id,
                'user_name_attended_at' => $user_attended_at->name,
                'user_email_attended_at' => $user_attended_at->email,
                'level_attended_at' => $level_user_attended_at,
            ]);

        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        Cache::flush();
        return redirect()->route('posts.edit', $post->id)->with('info', 'Solicitud Nro: '. $post->id . ' atendida con éxito!');
    }

    public function derivar(Request $request, $post)
    {
       
        $request->validate(['user_id' => 'required|not_in:Seleccione una opción...', 'rol_id' => 'required|not_in:Seleccione una opción...']);
        try {
            //Post
            $post = Post::find($post);
            $estado = Estado::find(3);
            $flujo = FlujoValore::find(1);
            $userActual = Auth::User()->id;
            $post->estado_id = $estado->id;
            $post->flujovalor_id = $flujo->id;
            $post->user_id_updated_at = $userActual;
            $post->user_id_asignated_at = $request->get('user_id');
            //$post->activa = true;
            $post->observacion = $request->get('observacion');
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
                //User_Asignated_at
                $user_asignated_at = User::find($post->user_id_asignated_at);
                $level_user_asignated_at = Role::where('name', '=', $user_asignated_at->current_rol)->pluck('level');
                $level_user_asignated_at = ( $level_user_asignated_at[0] ?? null);
                //User_Derived_at
                $user_derived_at= $user_updated_at;
                $level_user_derived_at = $level_user_updated_at;
                $level_user_derived_at = $level_user_updated_at;
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
                //Flujo Valor
                $flujovalor_nombre = FlujoValore::where('id', '=', $post->flujovalor_id)->pluck('nombre');
                $flujovalor_nombre = ($flujovalor_nombre[0] ?? 'Sin Asignar');
           
                $post->tipo_nombre = $tipo_nombre;
                $post->prioridad_nombre = $prioridad_nombre;
                $post->servicio_nombre = $servicio_nombre;
                $post->activo_nombre = $activo_nombre;
                $post->estado_nombre = $estado->nombre;
                $post->flujovalor_nombre = $flujovalor_nombre;
                //$post->user_name_created_at = $user_created_at->name;
                $post->user_name_updated_at = $user_updated_at->name;
                $post->user_name_asignated_at = $user_asignated_at->name;
                $post->save();

            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'tipo_nombre' => $tipo_nombre,
                'prioridad_id' => $post->prioridad_id,
                'prioridad_nombre' => $prioridad_nombre,
                'estado_id' => $post->estado_id,
                'estado_nombre' => $estado->nombre,
                'flujovalor_id' => $post->flujovalor_id,
                'flujovalor_nombre' => $flujovalor_nombre,
                'servicio_id' => $post->servicio_id,
                'servicio_nombre' => $servicio_nombre,
                'activo_id' =>  $post->activo_id,
                'activo_nombre' => $activo_nombre,
                'descripcion' => $post->descripcion,
                'observacion' => $post->observacion,
                'activa' => $post->activa,
                //user-created
                'role_user_created_at' => null,
                'user_id_created_at' => null,
                'user_name_created_at' => null,
                'user_email_created_at' => null,
                'level_created_at' => null,
                /*'role_user_created_at' => $user_created_at->current_rol,
                'user_id_created_at' => $user_created_at->id,
                'user_name_created_at' => $user_created_at->name,
                'user_email_created_at' => $user_created_at->email,
                'level_created_at' => $level_user_created_at,*/
                //user-updated
                'role_user_updated_at' => $user_updated_at->current_rol,
                'user_id_updated_at' => $user_updated_at->id,
                'user_name_updated_at' => $user_updated_at->name,
                'user_email_updated_at' => $user_updated_at->email,
                'level_updated_at' => $level_user_updated_at,
                //user-derived
                'role_user_derived_at' => $user_derived_at->current_rol,
                'user_id_derived_at' => $user_derived_at->id,
                'user_name_derived_at' => $user_derived_at->name,
                'user_email_derived_at' => $user_derived_at->email,
                'level_derived_at' => $level_user_derived_at,
                //user-asignated
                'role_user_asignated_at' => $user_asignated_at->current_rol,
                'user_id_asignated_at' => $user_asignated_at->id,
                'user_name_asignated_at' => $user_asignated_at->name,
                'user_email_asignated_at' => $user_asignated_at->email,
                'level_asignated_at' => $level_user_asignated_at,
            ]);
            
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        Cache::flush();
        event(new PostEvent($post));
        return redirect()->route('solicitudes.index')->with('info', 'Solicitud Nro: '. $post->id . ' derivada con éxito!');
    }

    public function cerrar(Request $request, $post)
    {
        $data = $request->validate(['respuesta' => ['required','min:25']]);
        try {
            $respuesta = $request->get('checkCerrar');
            if ($respuesta == 1) {
                $estado = 4;
                $flujo = 4;
                $respuesta = 0;
                $calificacion = 0;
            } else {
                $estado = 4;
                $flujo = 5;
                $respuesta = 1;
                $calificacion = 0;
            }
            //Post
                $post = Post::find($post);
                $userActual = Auth::User()->id;
                $post->estado_id = $estado;
                $post->flujovalor_id = $flujo;
                $post->user_id_updated_at = $userActual;
                $post->user_id_closed_at = $userActual;
                $post->observacion = $request->get('observacion');
                $post->calificacion = $calificacion;
                $post->votos = 0;
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
                //User_Closed_at
                $user_closed_at = User::find($post->user_id_closed_at);
                $level_user_closed_at = Role::where('name', '=', $user_closed_at->current_rol)->pluck('level');
                $level_user_closed_at = ( $level_user_closed_at[0] ?? null);
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
                //Estados
                $estado = Estado::find($estado);
                $estado_nombre = $estado->nombre;
                //Flujo Valor
                $flujovalor = FlujoValore::find($flujo);
                $flujovalor_nombre = $flujovalor->nombre;

                $post->tipo_nombre = $tipo_nombre;
                $post->prioridad_nombre = $prioridad_nombre;
                $post->servicio_nombre = $servicio_nombre;
                $post->activo_nombre = $activo_nombre;
                $post->estado_nombre = $estado->nombre;
                $post->flujovalor_nombre = $flujovalor_nombre;
                //$post->user_name_created_at = $user_created_at->name;
                $post->user_name_updated_at = $user_updated_at->name;
                //$post->user_name_asignated_at = null;
                $post->user_name_closed_at = $user_closed_at->name;
                $post->save();

            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'tipo_nombre' => $tipo_nombre,
                'prioridad_id' => $post->prioridad_id,
                'prioridad_nombre' => $prioridad_nombre,
                'estado_id' => $post->estado_id,
                'estado_nombre' => $estado->nombre,
                'flujovalor_id' => $post->flujovalor_id,
                'flujovalor_nombre' => $flujovalor_nombre,
                'servicio_id' => $post->servicio_id,
                'servicio_nombre' => $servicio_nombre,
                'activo_id' =>  $post->activo_id,
                'activo_nombre' => $activo_nombre,
                //'sla' => $post->sla,
                'descripcion' => $post->descripcion,
                'activa' => $post->activa,
                'observacion' => $post->observacion,
                //user-created
                /*'role_user_created_at' => $user_created_at->current_rol,
                'user_id_created_at' => $user_created_at->id,
                'user_name_created_at' => $user_created_at->name,
                'user_email_created_at' => $user_created_at->email,
                'level_created_at' => $level_user_created_at,*/
                //user-updated
                'role_user_updated_at' => $user_updated_at->current_rol,
                'user_id_updated_at' => $user_updated_at->id,
                'user_name_updated_at' => $user_updated_at->name,
                'user_email_updated_at' => $user_updated_at->email,
                'level_updated_at' => $level_user_updated_at,
                //user-asignated
                /* 'role_user_asignated_at' => null,
                'user_id_asignated_at' => null,
                'user_name_asignated_at' => null,
                'user_email_asignated_at' => null,
                'level_asignated_at' => null, */
            ]);
            //crear ruta y redireccionar a cerradas o solucionadas.index.
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }

        //Cerrada (0==Solucion, sino Sin Resolver), Redirecciono según rol.
        $userActual = User::find(Auth::User()->id);
        $role = $userActual->hasRole('Alumno');
        
        if ( $respuesta == 0) {
            if ($role) {
                //event(new PostEvent($post));
                broadcast(new PostEvent($post))->toOthers();
                Cache::flush();
                //return redirect()->route('mensajes', $post);
                return redirect()->route('solicitudes.index')->with('info', 'Solicitud Nro: '. $post->id . ' cerrada con éxito!');
            } else {
                //event(new PostEvent($post));
                broadcast(new PostEvent($post))->toOthers();
                Cache::flush();
                //return redirect()->route('mensajes', $post);
                return redirect()->route('solicitudes.index')->with('info', 'Solicitud Nro: '. $post->id . ' cerrada con éxito!');
            }
        } else {
            if ($role) {
                broadcast(new PostEvent($post))->toOthers();
                Cache::flush();
                return redirect()->route('solicitudes.index')->with('info', 'Solicitud Nro: '. $post->id . ' cerrada sin resolver!');
            } else {
                broadcast(new PostEvent($post))->toOthers();
                Cache::flush();
                return redirect()->route('solicitudes.index')->with('info', 'Solicitud Nro: '. $post->id . ' cerrada sin resolver!');
            }
        }
    }

    public function rechazar(Request $request, $post)
    {
        $request->validate(['observacion'=> 'required|min:25',]);
        try {
            //Post
            $post = Post::find($post);
            $estado = Estado::find(6);
            $flujo = FlujoValore::find(6);
            $userActual = Auth::User()->id;
            $post->estado_id = $estado->id;
            $post->flujovalor_id = $flujo->id;
            $post->user_id_updated_at = $userActual;
            $post->user_id_reject_at = $userActual;
            $post->activa = false;
            $post->observacion = $request->get('observacion');
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
                //User_Reject_at 
                $user_reject_at = User::find($post->user_id_reject_at);
                $level_user_reject_at = Role::where('name', '=', $user_reject_at->current_rol)->pluck('level');
                $level_user_reject_at = ( $level_user_reject_at[0] ?? null);
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
 
                $post->tipo_nombre = $tipo_nombre;
                $post->prioridad_nombre = $prioridad_nombre;
                $post->servicio_nombre = $servicio_nombre;
                $post->activo_nombre = $activo_nombre;
                $post->estado_nombre = $estado->nombre;
                $post->flujovalor_nombre = $flujo->nombre;
                //$post->user_name_created_at = $user_created_at->name;
                $post->user_name_updated_at = $user_updated_at->name;
                //$post->user_name_asignated_at = null;
                $post->user_name_reject_at = $user_reject_at->name;
                $post->save();

            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'tipo_nombre' => $tipo_nombre,
                'prioridad_id' => $post->prioridad_id,
                'prioridad_nombre' => $prioridad_nombre,
                'estado_id' => $post->estado_id,
                'estado_nombre' => $estado->nombre,
                'flujovalor_id' => $post->flujovalor_id,
                'flujovalor_nombre' => $flujo->nombre,
                'servicio_id' => $post->servicio_id,
                'servicio_nombre' => $servicio_nombre,
                'activo_id' =>  $post->activo_id,
                'activo_nombre' => $activo_nombre,
                //'sla' => $post->sla,
                'descripcion' => $post->descripcion,
                'observacion' => $post->observacion,
                'activa' => $post->activa,
                //user-created
                /*'role_user_created_at' => $user_created_at->current_rol,
                'user_id_created_at' => $user_created_at->id,
                'user_name_created_at' => $user_created_at->name,
                'user_email_created_at' => $user_created_at->email,
                'level_created_at' => $level_user_created_at,*/
                //user-updated
                'role_user_updated_at' => $user_updated_at->current_rol,
                'user_id_updated_at' => $user_updated_at->id,
                'user_name_updated_at' => $user_updated_at->name,
                'user_email_updated_at' => $user_updated_at->email,
                'level_updated_at' => $level_user_updated_at,
                //user-asignated
               /*  'role_user_asignated_at' => null,
                'user_id_asignated_at' => null,
                'user_name_asignated_at' => null,
                'user_email_asignated_at' => null,
                'level_asignated_at' => null, */
            ]);
            //crear ruta y redireccionar a rechazadas/papelera o spams.index.
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        event(new PostEvent($post));
        Cache::flush();
        return redirect()->route('solicitudes.index')->with('info', 'Solicitud Nro: '. $post->id . ' rechazada con éxito!');
    }

    public function buscar(Request $request){

        $tipo = $request->get('tipo_id');
        $prioridad = $request->get('prioridad_id');
        $search = $request->get('search');

        if ($tipo != "Todos" && $prioridad == "Todas" && $search == null) {
                $posts = Post::where('flujovalor_id', 'LIKE', '%' . 4 . '%')
                ->where('tipo_id', 'LIKE', '%' . $request->get('tipo_id') . '%')
                //->orderBy( 'id', $request->get('orden_id'))
                //->orderBy( 'titulo', $request->get('orden_id'))
                ->orderBy( 'calificacion', $request->get('orden_id'))
                ->get();

                $tipos = Tipo::all();
                $prioridades = Prioridade::all();
                return view('admin.home.index', compact('posts','tipos','prioridades'));

        } elseif ($tipo == "Todos" && $prioridad != "Todas" && $search == null){
                $posts = Post::where('flujovalor_id', 'LIKE', '%' . 4 . '%')
                ->where('prioridad_id', 'LIKE', '%' . $request->get('prioridad_id') . '%')
                //->orderBy( 'id', $request->get('orden_id'))
                //->orderBy( 'titulo', $request->get('orden_id'))
                ->orderBy( 'calificacion', $request->get('orden_id'))
                ->get();

                $tipos = Tipo::all();
                $prioridades = Prioridade::all();
                return view('admin.home.index', compact('posts','tipos','prioridades'));
                
        } elseif ($tipo != "Todos" && $prioridad != "Todas" && $search == null){
                $posts = Post::where('flujovalor_id', 'LIKE', '%' . 4 . '%')
                ->where('tipo_id', 'LIKE', '%' . $request->get('tipo_id') . '%')
                ->where('prioridad_id', 'LIKE', '%' . $request->get('prioridad_id') . '%')
                //->orderBy( 'id', $request->get('orden_id'))
                //->orderBy( 'titulo', $request->get('orden_id'))
                ->orderBy( 'calificacion', $request->get('orden_id'))
                ->get();

                $tipos = Tipo::all();
                $prioridades = Prioridade::all();
                return view('admin.home.index', compact('posts','tipos','prioridades'));

        }elseif ($tipo != "Todos" && $prioridad != "Todas" && $search != null) {
                $posts = Post::where('flujovalor_id', 'LIKE', '%' . 4 . '%')
                ->where('tipo_id', 'LIKE', '%' . $request->get('tipo_id') . '%')
                ->where('prioridad_id', 'LIKE', '%' . $request->get('prioridad_id') . '%')
                ->where('titulo', 'LIKE', '%' . $request->get('search') . '%')
                /*->whereBetween('created_at', [$request->get('desde'), $request->get('hasta')])*/
                //->orderBy( 'id', $request->get('orden_id'))
                //->orderBy( 'titulo', $request->get('orden_id'))
                ->orderBy( 'calificacion', $request->get('orden_id'))
                ->get();
    
                $tipos = Tipo::all();
                $prioridades = Prioridade::all();
                return view('admin.home.index', compact('posts','tipos','prioridades'));

        }elseif ($tipo == "Todos" && $prioridad == "Todas" && $search == null){
                $posts = Post::where('flujovalor_id', 'LIKE', '%' . 4 . '%')
                //->orderBy( 'id', $request->get('orden_id'))
                //->orderBy( 'titulo', $request->get('orden_id'))
                ->orderBy( 'calificacion', $request->get('orden_id'))
                ->get();

                $tipos = Tipo::all();
                $prioridades = Prioridade::all();
                return view('admin.home.index', compact('posts','tipos','prioridades'));

        }elseif ($tipo == "Todos" && $prioridad == "Todas" && $search != null){
                $posts = Post::where('flujovalor_id', 'LIKE', '%' . 4 . '%')
                ->where('titulo', 'LIKE', '%' . $request->get('search') . '%')
                //->orderBy( 'id', $request->get('orden_id'))
                //->orderBy( 'titulo', $request->get('orden_id'))
                ->orderBy( 'calificacion', $request->get('orden_id'))
                ->get();

                $tipos = Tipo::all();
                $prioridades = Prioridade::all();
                return view('admin.home.index', compact('posts','tipos','prioridades'));
        }
    }

    public function respuesta(Post $post){
    
        return view('admin.home.respuesta',compact('post'));
    }

    public function buscarRespuesta(Request $request){
            $post = Post::find(1);
            $search = $post->titulo;

            $posts = Post::where('flujovalor_id', 4)
            ->where('id', $post->id)
            ->orderBy( 'calificacion', 'asc')
            ->get();

            $tipos = Tipo::all();
            $prioridades = Prioridade::all();
            return view('admin.home.index', compact('posts','tipos','prioridades'));
     }
}
