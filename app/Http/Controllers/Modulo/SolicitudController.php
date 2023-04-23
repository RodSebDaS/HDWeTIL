<?php

namespace App\Http\Controllers\Modulo;

use App\Events\ComentarioEvent;
use App\Events\PostEvent;
use App\Http\Controllers\Controller;
use App\Http\Livewire\Home\HomeIndex;
use App\Http\Requests\StoreSolicitudRequest;
use App\Models\Tipo;
use App\Models\Activo;
use App\Models\Estado;
use App\Models\Prioridade;
use App\Models\FlujoValore;
use App\Models\Post;
use App\Models\ProcesosPostsUser;
use App\Models\ProcesosImage;
use App\Models\ProcesosComentario;
use App\Models\Persona;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Idn;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comentario;
use App\Models\Image;
use App\Models\Level;
use App\Notifications\PostNotificaction;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;
use Exception;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
//use RealRashid\SweetAlert\Facades\Alert;

class SolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:solicitudes.index')->only('index');
        $this->middleware('can:solicitudes.create')->only('create','image.upload');
        $this->middleware('can:solicitudes.edit')->only('edit','posts.atender', 'image.upload');
        $this->middleware('can:solicitudes.store')->only('store', 'image.upload');
        $this->middleware('can:solicitudes.show')->only('show','posts.atender', 'image.upload');
        $this->middleware('can:solicitudes.update')->only('update','comentarios.edit','posts.atender', 'image.upload');
        $this->middleware('can:solicitudes.destroy')->only('destroy', 'image.upload');

        $this->middleware('can:solicitudes.sinatender')->only('solicitudes.sinatender');
        $this->middleware('can:solicitudes.atendidas')->only('solicitudes.atendidas');
        $this->middleware('can:solicitudes.cerradas')->only('solicitudes.cerradas');
        $this->middleware('can:solicitudes.rechazadas')->only('solicitudes.rechazadas');
        $this->middleware('can:solicitudes.incidencias')->only('solicitudes.incidencias');
        $this->middleware('can:solicitudes.asignadas')->only('solicitudes.asignadas');
        $this->middleware('can:solicitudes.derivadas')->only('solicitudes.derivadas');
    }

    public function index()
    {
        $ruta = Route::currentRouteName();
        $estadoNombre = "";
        return view('solicitudes.index', compact('estadoNombre', 'ruta')); 
    }

    public function sinatender()
    {
        $ruta = Route::currentRouteName();
        $estado = FlujoValore::find(1);
        $estadoNombre = $estado->nombre;
        $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        if ( $role ) {
                $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', '=', Estado::first()->id)
                //->orwhereBetween('estado_id', [5,6])
                ->orderBy('estado_id', 'asc')
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
        } elseif ($user->hasRole('Mesa de Ayuda')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->where('estado_id', '=', Estado::first()->id)
            //->where('flujovalor_id', '=', FlujoValore::first()->id)
            //->orwhere('user_id_updated_at', '=', $user->id)
            ->orwhere('user_id_created_at', '=', $user->id)
            //->orwhereBetween('estado_id', [5,6])
            ->orderBy('estado_id', 'asc')
            ->orderBy('posts.updated_at', 'desc')
            //->orderBy('posts.prioridad_id', 'desc')
            ->get();
        } elseif ($user->hasRole('Soporte Técnico') || $user->hasRole('Especialista')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', '=', 1)
                ->where('user_id_asignated_at', '=', $user->id)
                ->orwhere('user_id_created_at', '=', $user->id)
                //->orwhere('user_id_updated_at', '=', $user->id)
                //->orwhereBetween('estado_id', [5,6])
                ->orderBy('estado_id', 'asc')
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
        } elseif ($user->hasRole('Alumno')) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->where('estado_id', 1)
            ->where('user_id_created_at', '=', $user->id)
                //->orwhereBetween('estado_id', [5,6])
            ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
            ->get();     
        }
        return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));
    }

    public function atendidas()
    {
        $ruta = Route::currentRouteName();
        $estado = Estado::find(2);
        $estadoNombre = $estado->nombre . "s";
        $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        if ( $role ) {
                $solicitudes = Post::whereBetween('estado_id', [2,3])->get();
                //->where('estado_id', '=', Estado::first()->id)
                //->orwhereBetween('estado_id', [5,6])
                //->orderBy('estado_id', 'asc')
                //->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));
        } elseif ($user->hasRole('Mesa de Ayuda')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->whereBetween('estado_id', [2,3])
            ->where('user_id_updated_at', '=', $user->id)
            ->orwhere('user_id_created_at', '=', $user->id)
            //->orwhereBetween('estado_id', [5,6])
            ->orderBy('estado_id', 'asc')
            ->orderBy('posts.updated_at', 'desc')
            //->orderBy('posts.prioridad_id', 'desc')
            ->get();
            return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));

        } elseif ($user->hasRole('Soporte Técnico') || $user->hasRole('Especialista')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->whereBetween('estado_id', [2,3])
            ->where('user_id_asignated_at', '=', $user->id)
            ->orwhere('user_id_created_at', '=', $user->id)
            ->orwhere('user_id_updated_at', '=', $user->id)
            //->orwhereBetween('estado_id', [5,6])
            ->orderBy('estado_id', 'asc')
            ->orderBy('posts.updated_at', 'desc')
            //->orderBy('posts.prioridad_id', 'desc')
            ->get();
            return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));

        } elseif ($user->hasRole('Alumno')) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->whereBetween('estado_id', [2,3])
                //->orwhere('estado_id', 3)
                ->where('user_id_created_at', '=', $user->id)
               //->orwhereBetween('estado_id', [5,6])
               ->orderBy('posts.updated_at', 'desc')
               //->orderBy('posts.prioridad_id', 'desc')
               ->get(); 
            return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));     
        }
    }

    public function cerradas()
    {
        //$ruta = $request->headers->get('referer');
        $ruta = Route::currentRouteName();
        $estado = Estado::find(4);
        $estadoNombre = $estado->nombre . "s";
        $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        if ( $role ) {
                $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                //->where('estado_id', '=', Estado::first()->id)
                //->orwhereBetween('estado_id', [5,6])
                ->where('estado_id', 4)
                ->orderBy('estado_id', 'asc')
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
        } elseif ($user->hasRole('Mesa de Ayuda')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->where('user_id_updated_at', '=', $user->id)
            ->orwhere('user_id_created_at', '=', $user->id)
            ->where('user_id_updated_at', '=', $user->id)
            ->where('estado_id', 4)
            //->orwhereBetween('estado_id', [5,6])
            ->orderBy('estado_id', 'asc')
            ->orderBy('posts.updated_at', 'desc')
            //->orderBy('posts.prioridad_id', 'desc')
            ->get();
        } elseif ($user->hasRole('Soporte Técnico') || $user->hasRole('Especialista')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('user_id_asignated_at', '=', $user->id)
                ->orwhere('user_id_created_at', '=', $user->id)
                ->orwhere('user_id_updated_at', '=', $user->id)
                ->where('estado_id', '=', 4)
                //->orwhereBetween('estado_id', [5,6])
                ->orderBy('estado_id', 'asc')
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
        } elseif ($user->hasRole('Alumno')) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', 4)
                ->where('user_id_created_at', '=', $user->id)
                //->orwhereBetween('estado_id', [5,6])
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
        }
        return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));
    }

    public function rechazadas()
    {
        $ruta = Route::currentRouteName();
        $estado = Estado::find(6);
        $estadoNombre = $estado->nombre . "s";
        $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        if ( $role ) {
                $solicitudes = Post::where('estado_id', 6)->get();
        } elseif ($user->hasRole('Mesa de Ayuda')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->where('user_id_created_at', '=', $user->id)
            ->orwhere('user_id_updated_at', '=', $user->id)
            ->where('estado_id', '=', 6)
            //->orwhereBetween('estado_id', [5,6])
            ->orderBy('estado_id', 'asc')
            ->orderBy('posts.updated_at', 'desc')
            //->orderBy('posts.prioridad_id', 'desc')
            ->get();
        } elseif ($user->hasRole('Soporte Técnico') || $user->hasRole('Especialista')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', '=', 6)
                //->where('user_id_asignated_at', '=', $user->id)
                ->where('user_id_updated_at', '=', $user->id)
                ->orwhere('user_id_created_at', '=', $user->id)
                //->orwhereBetween('estado_id', [5,6])
                ->orderBy('estado_id', 'asc')
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
        } elseif ($user->hasRole('Alumno')) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', 6)
                ->where('user_id_created_at', '=', $user->id)
                //->orwhereBetween('estado_id', [5,6])
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
        }
        return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));
    }

    public function incidencias()
    {
        $ruta = Route::currentRouteName();
        $estado = Tipo::find(1);
        $estadoNombre = $estado->nombre . "s";
        $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        if ( $role ) {
                $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', '=', 1)
                ->get();
        } elseif ($user->hasRole('Mesa de Ayuda')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->where('tipo_id', '=', 1)
            ->where('user_id_updated_at', '=', $user->id)
            ->orwhere('user_id_created_at', '=', $user->id)
            ->get();
        } elseif ($user->hasRole('Soporte Técnico') || $user->hasRole('Especialista')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', '=', 1)
                ->where('user_id_asignated_at', '=', $user->id)
                ->orwhere('user_id_created_at', '=', $user->id)
                ->orwhere('user_id_updated_at', '=', $user->id)
                ->get();
        } elseif ($user->hasRole('Alumno')) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', '=', 1)
                ->where('user_id_created_at', '=', $user->id)
                ->orwhere('user_id_updated_at', '=', $user->id)
                ->get();
        }
        return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));
    }

    public function asignadas()
    {
        $ruta = Route::currentRouteName();
        $estado = Estado::find(3);
        $estadoNombre = $estado->nombre . "s";
        $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        if ( $role ) {
                $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', 3)
                ->get();
        } elseif ($user->hasRole('Mesa de Ayuda')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->where('estado_id', 3)
            ->where('user_id_asignated_at', '=', $user->id)
            ->get();
        } elseif ($user->hasRole('Soporte Técnico') || $user->hasRole('Especialista')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', 3)
                ->where('user_id_asignated_at', '=', $user->id)
                ->get();
        } elseif ($user->hasRole('Alumno')) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', 3)
                ->where('user_id_asignated_at', '=', $user->id)
                ->get();
        }
        return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));
    }

    public function derivadas()
    {
        $ruta = Route::currentRouteName();
        $estado = Estado::find(3);
        $estadoNombre = $estado->nombre . "s";
        $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        if ( $role ) {
                $solicitudes = Post::where('estado_id', 3)->get();
        } elseif ($user->hasRole('Mesa de Ayuda')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->where('estado_id', 3)
            ->where('user_id_asignated_at', '=', $user->id)
            ->get();
        } elseif ($user->hasRole('Soporte Técnico') || $user->hasRole('Especialista')) {
            $solicitudes = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', 3)
                ->where('user_id_asignated_at', '=', $user->id)
                ->get();
        } elseif ($user->hasRole('Alumno')) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', 3)
                ->where('user_id_asignated_at', '=', $user->id)
                ->get();
        }
        return view('solicitudes.index', compact('estadoNombre', 'ruta', 'solicitudes'));
    }

    public function create()
    {
        try {
            $prioridades = Prioridade::all();
            $servicios = Servicio::all();
            $activos = Activo::all();
            $tipos = Tipo::all();
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return view('solicitudes.create', compact('prioridades', 'servicios', 'activos', 'tipos'));
    }

    public function store(StoreSolicitudRequest $request)
    { 
        try {
            //Post
                $post = new Post();
                $estado = Estado::first();
                $flujo = FlujoValore::first();
                $userActual = Auth::User()->id;
                $post->titulo = $request->get('titulo');
                $tipo = $request->get('tipo_id');
                $prioridad = $request->get('prioridad_id');
                $prioridad = ($prioridad ?? 0); //(($prioridad !== null) ? $prioridad : '1');
                $post->servicio_id = $request->get('servicio_id')??0;
                $post->activo_id = $request->get('activo_id')??0;
                //$post->sla = $request->get('sla');
                $post->descripcion = $request->get('descripcion');
                $post->respuesta = $request->get('respuesta');
                $post->observacion = $request->get('observacion')??'';
                $post->tipo_id = $tipo;
                $post->prioridad_id = $prioridad;
                $post->estado_id = $estado->id;
                $post->flujovalor_id = $flujo->id;
                $post->user_id_created_at = $userActual;
                $post->user_id_updated_at = $userActual;
                $post->activa = true;
                $post->save();

            //Imagen
                $re_extractImages = '/src=["\']([^ ^"^\']*)/ims';
                preg_match_all($re_extractImages, $request->get('descripcion'), $matches);
                $images = $matches[1];
                foreach ($images as $image) {
                    $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);
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
                }
           
            //Proceso
                //User_Created_at
                $user_created_at = User::find($post->user_id_created_at);
                $level_user_created_at = Role::where('name', '=', $user_created_at->current_rol)->pluck('level');
                $level_user_created_at = ($level_user_created_at[0] ?? null);
                //Servicio
                $servicio_nombre = Servicio::where('id', '=', $post->servicio_id)->pluck('nombre');
                $servicio_nombre = ($servicio_nombre[0] ?? 'Sin Asignar');
                //Activo
                $activo_nombre = Activo::where('id', '=', $post->activo_id)->pluck('nombre');
                $activo_nombre = ($activo_nombre[0] ?? 'Sin Asignar');
                //Tipo
                $tipo_nombre = Tipo::where('id', '=', $post->tipo_id)->pluck('nombre');
                $tipo_nombre = ($tipo_nombre[0] ?? 'Sin Asignar');
                //Prioridad
                $prioridad_nombre = Prioridade::where('id', '=', $post->prioridad_id)->pluck('nombre');
                $prioridad_nombre = ($prioridad_nombre[0] ?? 'Sin Asignar');
                //Estado
                $estado_nombre = Estado::where('id', '=', $post->estado_id)->pluck('nombre');
                $estado_nombre = ($estado_nombre[0] ?? 'Sin Asignar');
                //Flujo Valor
                $flujovalor_nombre = FlujoValore::where('id', '=', $post->flujovalor_id)->pluck('nombre');
                $flujovalor_nombre = ($flujovalor_nombre[0] ?? 'Sin Asignar');

                $post->tipo_nombre = $tipo_nombre;
                $post->prioridad_nombre = $prioridad_nombre;
                $post->servicio_nombre = $servicio_nombre;
                $post->activo_nombre = $activo_nombre;
                $post->estado_nombre = $estado_nombre;
                $post->flujovalor_nombre = $flujovalor_nombre;
                $post->user_name_created_at = $user_created_at->name;
                $post->user_name_updated_at = $user_created_at->name;
                $post->user_name_asignated_at = null;
                $post->save();

            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'tipo_nombre' => $tipo_nombre,
                'prioridad_id' => $post->prioridad_id,
                'prioridad_nombre' => $prioridad_nombre,
                'estado_id' => $post->estado_id,
                'estado_nombre' => $estado_nombre,
                'flujovalor_id' => $post->flujovalor_id,
                'flujovalor_nombre' => $flujovalor_nombre,
                'servicio_id' => $post->servicio_id,
                'servicio_nombre' => $servicio_nombre,
                'activo_id' =>  $post->activo_id,
                'activo_nombre' => $activo_nombre,
                //'sla' => $request->get('sla'),
                'descripcion' => $post->descripcion,
                'respuesta' => $post->respuesta,
                'observacion' => $post->observacion,
                'activa' => $post->activa,
                //user-created
                'role_user_created_at' => $user_created_at->current_rol,
                'user_id_created_at' => $post->user_id_created_at,
                'user_name_created_at' => $user_created_at->name,
                'user_email_created_at' => $user_created_at->email,
                'level_created_at' => $level_user_created_at,
                //user-updated
                'role_user_updated_at' => $user_created_at->current_rol,
                'user_id_updated_at' => $post->user_id_updated_at,
                'user_name_updated_at' => $user_created_at->name,
                'user_email_updated_at' => $user_created_at->email,
                'level_updated_at' => $level_user_created_at,
                //user-asignated
                'role_user_asignated_at' => null,
                'user_id_asignated_at' => null,
                'user_name_asignated_at' => null,
                'user_email_asignated_at' => null,
                'level_asignated_at' => null,
            ]);
            
        broadcast(new PostEvent($post))->toOthers();
        
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        //event(new PostEvent($post));
        //PostEvent::dispatch($post);
        //broadcast(new PostEvent($post))->toOthers();
        //Alert::success('Solicitud Registrada!' ,'Solicitud '. $post->id . ' creada con éxito','success');
        Cache::flush();
        //return redirect()->route('mensajes', $post);
        return redirect()->route('solicitudes.index')->with('info','Solicitud Nro: '. $post->id . ' registrada con éxito');
    }

    public function show($solicitud)
    {
        try {
            //$ruta = Route::getCurrentRoute();
            //$solicitud = $ruta->solicitude;
            //$post = Post::find($p->post_id);
            //dd($this->post->solicitud);
            $post = Post::find($solicitud);
            $estado = Estado::find($post->estado_id);
            $accion = $estado->nombre;
            //dd( $accion);
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

    public function edit($solicitud)
    {
        try {
            $post = Post::find($solicitud);
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
        return view('solicitudes.edit', compact('accion', 'post', 'prioridades', 'servicios', 'activos', 'tipos', 'comentarios'));
    }

    public function update(Request $request, $post)
    {
        //$validator = Validator::make($request->all(),(['titulo'=> 'required|min:15|unique:posts|max:255']),$messages = [
        //   'titulo.required'  => '',]);
    
        /*if ($validator->fails()) {
            $request->session()->flash('info','El título ya ha sido registrado. Puede dirigirse a: 
            Home - Preguntas Frecuentes y ver su solución. Muchas gracias!');
        }*/
        $data = $request->validate(['titulo' => 'required|min:15|max:255',
        'descripcion' => 'required|min:15', 'prioridad_id' => 'required|not_in:Sin Asignar',
        'activo_id' => 'required|not_in:Sin Asignar', 'servicio_id' => 'required|not_in:Sin Asignar']);
        
        $post = Post::find($post);
        //dd($post);
        if ($post->flujovalor_id == 4) {
            //$data = $request->validate(['respuesta' => 'required|min:25']);
        }
        
        try {
           
            //$tareas = $post->postTareas->count();
            $acciones = $request->get('respuesta');
            if ($acciones !== null) {
                $post->flujovalor_id = 3;
            }
           
            //Post
            $estado = Estado::find(7);
            $estado_id =  $estado->id;
            $userActual = Auth::User()->id;
            $post->titulo = $request->get('titulo');
            $post->tipo_id = $request->get('tipo_id');
            $post->prioridad_id = ($request->get('prioridad_id') ?? 1);
            $post->estado_id = $post->estado_id;
            $post->flujovalor_id =  $post->flujovalor_id;
            $post->servicio_id = $request->get('servicio_id');
            $post->activo_id = $request->get('activo_id') ?? 0;   
            //$post->sla = Carbon::createFromFormat('d/m/Y H:i', $request->get('sla'))->format('d-m-Y H:i');
            $post->descripcion = $request->get('descripcion');
            $mensaje = $request->get('mensaje');
            $post->mensaje = $mensaje;
            $post->respuesta = $request->get('respuesta');
            $post->observacion = $request->get('observacion')??null;
            $post->user_id_updated_at = $userActual;
            //$post->activa = true;
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
                $estado = $estado;
                $estado_id =  $estado_id;
                $estado_nombre =   $estado->nombre;
                $estado_nombre = ($estado->nombre ?? 'Sin Asignar');
                //Flujo Valor
                $flujovalor_nombre = FlujoValore::where('id', '=', $post->flujovalor_id)->pluck('nombre');
                $flujovalor_nombre = ($flujovalor_nombre[0] ?? 'Sin Asignar');

                $post->tipo_nombre = $tipo_nombre;
                $post->prioridad_nombre = $prioridad_nombre;
                $post->servicio_nombre = $servicio_nombre;
                $post->activo_nombre = $activo_nombre;
                $post->estado_nombre = $estado_nombre;
                $post->flujovalor_nombre = $flujovalor_nombre;
                //$post->user_name_created_at = $user_created_at->name;
                $post->user_name_updated_at = $user_updated_at->name;
                //$post->user_name_asignated_at = null;
                $post->save();

            //Comentarios
               //$mensajeEdit = $request->get('mensajeEdit');
               if ($mensaje !== null) {
                   $comentario = new Comentario();
                   $comentario->post_id = $post->id;
                   $comentario->user_id =  Auth::User()->id;
                   $comentario->mensaje = $mensaje;
                   $comentario->calificacion = $request->get('calificacion');
                   $comentario->save();
                   ProcesosComentario::create([
                       'post_id' => $comentario->post_id,
                       'role_user_created_at' =>  Auth::User()->current_rol,
                       'user_id_created_at' =>  $comentario->user_id,
                       'user_name_created_at' =>  Auth::User()->name,
                       'user_email_created_at' =>  Auth::User()->email,
                       'role_user_updated_at' =>  $user_updated_at->current_rol,
                       'user_id_updated_at' =>  $post->user_id_updated_at,
                       'user_name_updated_at' =>  $user_updated_at->name,
                       'user_email_updated_at' =>  $user_updated_at->email,
                       'comentario_id' => $comentario->id,
                       'mensaje' => $comentario->mensaje,
                       'calificacion' => $comentario->calificacion,
                   ]);
                   //event(new ComentarioEvent($comentario));
                   return redirect()->back()->with('success', 'Comentario enviado!');
               } 
               
            ProcesosPostsUser::create([
                'post_id' => $post->id,
                'titulo' => $post->titulo,
                'tipo_id' => $post->tipo_id,
                'tipo_nombre' => $tipo_nombre,
                'prioridad_id' => $post->prioridad_id,
                'prioridad_nombre' => $prioridad_nombre,
                'estado_id' => $estado_id,
                'estado_nombre' => $estado_nombre,
                'flujovalor_id' => $post->flujovalor_id,
                'flujovalor_nombre' => $flujovalor_nombre,
                'servicio_id' => $post->servicio_id,
                'servicio_nombre' => $servicio_nombre,
                'activo_id' =>  $post->activo_id,
                'activo_nombre' => $activo_nombre,
                //'sla' => $post->sla,
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
        Cache::flush();
        return redirect()->route('solicitudes.show', $post->id)->with('info', 'Solicitud modificada con éxito!');
    }

    public function destroy($post)
    {
        try {
            $post = Post::find($post);
            $post->delete();
        } catch (Throwable $e) {
            return back()->withError($e->getMessage())->withInput();
        }
        Cache::flush();
        return redirect()->route('solicitudes.index')->with('info', 'Solicitud eliminada con éxito!');
    }
}
