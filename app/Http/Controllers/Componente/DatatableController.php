<?php

namespace App\Http\Controllers\Componente;

use App\Http\Controllers\Controller;
use App\Models\Activo;
use App\Models\Audit;
use App\Models\Auditoria;
use Illuminate\Http\Request;
use App\Models\ProcesosPostsUser;
use App\Models\Post;
use App\Models\Estado;
use App\Models\Prioridade;
use App\Models\FlujoValore;
use GuzzleHttp\Promise\Each;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Level;
use App\Models\Servicio;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Puntaje;
use App\Models\Tipo;
use Carbon\Carbon;
use FontLib\Table\Type\post as TypePost;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Yajra\DataTables\DataTablesServiceProvider;
use Illuminate\Support\Facades\Route;

class DatatableController extends Controller
{
    public function __construct()
    { 
        $this->middleware('can:datatable.users')->only('users');
        $this->middleware('can:datatable.solicitudes')->only('solicitudes');
        $this->middleware('can:datatable.posts')->only('posts');
        $this->middleware('can:datatable.activos')->only('activos');
        $this->middleware('can:datatable.servicios')->only('servicios');
        $this->middleware('can:datatable.auditorias')->only('auditorias');
    }

    public function filtro(Request $request)
    {
        $referer = $request->headers->get('referer');
        if (stristr($referer, 'users')) {
            $nombre = $request->get('nombre');
            $fechaDesde = $request->get('desde');
            $fechaHasta = $request->get('hasta');
            $email = $request->get('email');

            $users = User::where('name', '=', $nombre)
                ->orwhere('created_at', '=', $fechaDesde)
                ->orwhere('created_at', '=', $fechaHasta)
                ->orwhere('email', '=', $email)
                ->get();

            return datatables()->of($users)
                ->addColumn('btn', 'solicitudes.partials.actions')
                ->rawColumns(['btn'])
                ->toJson();
            /*make(true);*/
        } elseif (stristr($referer, 'solicitudes')) {
        } {
        }
    }

    public function users()
    {
        $users = User::select(['id', 'name', 'email'])->get();

        return datatables()->of($users)
            ->addColumn('btn', 'admin.users.partials.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function solicitudes()
    {
        $user = User::find(Auth::User()->id);

        $role = $user->hasRole('Admin');
        $roles = $user->getRoleNames();
        $userLevels = $this->hasLevel($roles);
        if ( $role ) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', '=', Estado::first()->id)
                //->where('user_id_created_at', '=', $user->id)
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
            return datatables()->of($solicitudes)
                ->addColumn('btn', 'solicitudes.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                    //return $model->name . '' . $model->created_at->diffForHumans();
                })
                ->addColumn('updated_at', function ($model) {
                    return $model->name . '' . $model->updated_at->diffForHumans();
                })
               //->addColumn('updated_at', function ($model) {
                //    return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->format('d/m/Y H:i');
                 //})
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (!empty($userLevels)) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', '=', Estado::first()->id)
                ->orderBy('posts.updated_at', 'desc')
                //->orderBy('posts.prioridad_id', 'desc')
                ->get();
            return datatables()->of($solicitudes)
                ->addColumn('btn', 'solicitudes.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                    //return $model->name . '' . $model->created_at->diffForHumans();
                })
                ->addColumn('updated_at', function ($model) {
                    return $model->name . '' . $model->updated_at->diffForHumans();
                })
                //->addColumn('updated_at', function ($model) {
                //    return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->format('d/m/Y H:i');
                // })
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (empty($userLevels)) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('user_id_created_at', '=', $user->id)
                ->orderBy('posts.created_at', 'desc')
                ->get();
            return datatables()->of($solicitudes)
                ->addColumn('btn', 'solicitudes.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return $model->name . '' . $model->created_at->diffForHumans();
                })
                //->addColumn('updated_at', function ($model) {
                //   return $model->name . '' . $model->updated_at->diffForHumans();
                //})
                ->addColumn('updated_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->format('d/m/Y H:i');
                })
                ->rawColumns(['btn'])
                ->toJson();
        }
    }
    
    public function posts(Request $request)
    {
        $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        $ruta = $request->headers->get('referer');
        if (stristr($ruta, 'atendidas')) {

            if ( $role ) {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', 1)
                ->where('estado_id', 2)
                //->orwhereBetween('estado_id', [5,6])
                //->whereBetween('flujovalor_id', [2,6])
                //->where('user_id_updated_at', '=', $user->id)
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
            ->get();
            }else {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', 1)
                ->where('estado_id', 2)
                //->orwhereBetween('estado_id', [5,6])
                //->whereBetween('flujovalor_id', [2,6])
                ->where('user_id_updated_at', '=', $user->id)
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
               ->get();   
            }
            //$estado = Estado::find(2);

            /*$posts = DB::table('posts')
            ->join('procesos_posts_users', 'post_id', '=', 'posts.id')
            ->join('tipos', 'tipos.id', '=', 'posts.tipo_id')
            ->join('estados', 'estados.id', '=', 'posts.estado_id')
            ->join('flujo_valores', 'flujo_valores.id', '=', 'posts.flujovalor_id')
            ->leftJoin('prioridades', 'prioridades.id', '=', 'posts.prioridad_id')
            ->leftJoin('servicios', 'servicios.id', '=', 'posts.servicio_id')
            ->leftJoin('activos', 'activos.id', '=', 'posts.activo_id')
            ->where('procesos_posts_users.estado_id', '=', $estado->id)
            ->orwhere('procesos_posts_users.user_id_updated_at', '=', $user->id)
            ->select('post_id as id', 'tipos.nombre as tipo_nombre', 'procesos_posts_users.created_at as created_at', 
            'procesos_posts_users.titulo', 'posts.sla','servicios.nombre as servicio_nombre',
            'activos.nombre as activo_nombre', 'estados.nombre as estado_nombre', 'flujo_valores.nombre as flujo_nombre', 
            'prioridades.nombre as prioridad_nombre')
            ->get();*/
           
            return datatables()->of($posts)
                //->addColumn('btn', 'posts.partials.actions')
                ->addColumn('btn', 'posts.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                   //return Carbon::parse($model->created_at)->diffForHumans();
                })
                ->addColumn('updated_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->diffForHumans();
                })
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (stristr($ruta, 'asignadas')) {
            if ( $role ) {
                $posts = Post::with(['user:id,name','tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', 1)
                ->where('estado_id', 3)
                //->whereBetween('flujovalor_id', [2,6])
                //->where('user_id_asignated_at', '=', $user->id)
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
               ->get();
            }else{
                $posts = Post::with(['user:id,name','tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', 1)
                ->where('estado_id', 3)
                //->whereBetween('flujovalor_id', [2,6])
                ->where('user_id_asignated_at', '=', $user->id)
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
               ->get();    
            }
            //$estado = Estado::find(3);
           /* $posts = ProcesosPostsUser::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                ->where('estado_id', '>=', $estado->id)
                ->where('user_id_asignated_at', '=', $user->id)
                ->groupBy('user_id_asignated_at', 'id')
                ->get();
            */
            /*$posts = DB::table('posts')
                ->join('procesos_posts_users', 'post_id', '=', 'posts.id')
                ->join('tipos', 'tipos.id', '=', 'posts.tipo_id')
                ->join('estados', 'estados.id', '=', 'posts.estado_id')
                ->join('flujo_valores', 'flujo_valores.id', '=', 'posts.flujovalor_id')
                ->join('prioridades', 'prioridades.id', '=', 'posts.prioridad_id')
                ->join('servicios', 'servicios.id', '=', 'posts.servicio_id')
                ->join('activos', 'activos.id', '=', 'posts.activo_id')
                ->where('procesos_posts_users.estado_id', '>=', $estado->id)
                ->where('procesos_posts_users.user_id_asignated_at', '=', $user->id)
                ->select('post_id as id', 'tipos.nombre as tipo_nombre', 'procesos_posts_users.created_at as created_at', 
                'procesos_posts_users.titulo', 'procesos_posts_users.user_name_asignated_at', 'procesos_posts_users.user_email_asignated_at', 
                'posts.sla','servicios.nombre as servicio_nombre', 'activos.nombre as activo_nombre', 'estados.nombre as estado_nombre', 
                'flujo_valores.nombre as flujo_nombre', 'prioridades.nombre as prioridad_nombre')
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
                ->get();*/

            return datatables()->of($posts)
                ->addColumn('btn', 'posts.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                })
                ->addColumn('updated_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->diffForHumans();
                 })
                 ->addColumn('asignated_at', function ($model) {
                    $user = User::where('id', $model->user_id_updated_at)->pluck('name');
                    $user = Arr::first($user);
                    return ('Por: ' . $user);
                 })
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (stristr($ruta, 'derivadas')) {
            //$estado = Estado::find(3);
            /*$posts = ProcesosPostsUser::with(['user:id,name', 'post:id,titulo','tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', '=', $estad'user:id,name', o->id)
                ->where('user_id_updated_at', '=', $user->id)
                ->get();
            */
            /*$posts = DB::table('posts')
            ->join('procesos_posts_users', 'post_id', '=', 'posts.id')
            ->join('tipos', 'tipos.id', '=', 'posts.tipo_id')
            ->join('estados', 'estados.id', '=', 'posts.estado_id')
            ->join('flujo_valores', 'flujo_valores.id', '=', 'posts.flujovalor_id')
            ->join('prioridades', 'prioridades.id', '=', 'posts.prioridad_id')
            ->join('servicios', 'servicios.id', '=', 'posts.servicio_id')
            ->join('activos', 'activos.id', '=', 'posts.activo_id')
            ->where('procesos_posts_users.estado_id', '=', $estado->id)
            ->where('procesos_posts_users.user_id_updated_at', '=', $user->id)
            ->select('post_id as id', 'tipos.nombre as tipo_nombre', 'procesos_posts_users.created_at as created_at', 
            'procesos_posts_users.titulo', 'procesos_posts_users.user_name_asignated_at', 'procesos_posts_users.user_email_asignated_at',
            'posts.sla','servicios.nombre as servicio_nombre', 'activos.nombre as activo_nombre', 'estados.nombre as estado_nombre', 
            'flujo_valores.nombre as flujo_nombre', 'prioridades.nombre as prioridad_nombre')
            ->get();*/
            if ( $role ) {
                $posts = Post::with(['user:id,name','tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', 1)
                ->where('estado_id', 3)
                //->whereBetween('flujovalor_id', [2,6])
                //->where('user_id_updated_at', '=', $user->id)
                //->where('user_id_asignated_at', '<>', $user->id)
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
            ->get();
            } else {
                $posts = Post::with(['user:id,name','tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', 1)
                ->where('estado_id', 3)
                //->whereBetween('flujovalor_id', [2,6])
                ->where('user_id_updated_at', '=', $user->id)
                //->where('user_id_asignated_at', '<>', $user->id)
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
            ->get();
            }
            
            $posts = Post::with(['user:id,name','tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
            ->where('tipo_id', 1)
            ->where('estado_id', 3)
            //->whereBetween('flujovalor_id', [2,6])
            ->where('user_id_updated_at', '=', $user->id)
            //->where('user_id_asignated_at', '<>', $user->id)
            ->orderBy('posts.prioridad_id', 'desc')
            ->orderBy('posts.updated_at', 'asc')
           ->get();

            return datatables()->of($posts)
                ->addColumn('btn', 'posts.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                })
                 ->addColumn('updated_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->diffForHumans();
                 })
                 ->addColumn('asignated_at', function ($model) {
                    $user = User::where('id', $model->user_id_asignated_at)->pluck('name');
                    $user = Arr::first($user);
                    return ('A: ' . $user);
                 })
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (stristr($ruta, 'pendientes')) {
            if ( $role ) {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', 1)
                ->whereBetween('estado_id', [1,3])
                //->where('flujovalor_id', '<', 4)
                ->orWhere('flujovalor_id', '=', 5)
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
               ->get();
            } else {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('tipo_id', 1)
                ->whereBetween('estado_id', [1,3])
                //->where('flujovalor_id', '<', 4)
                ->where('user_id_updated_at', '=', $user->id)
                ->orWhere('flujovalor_id', '=', 5)
                ->orderBy('posts.prioridad_id', 'desc')
                ->orderBy('posts.updated_at', 'asc')
               ->get();
            }
             
            return datatables()->of($posts)
               ->addColumn('btn', 'posts.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                })
                ->addColumn('updated_at', function ($model) {
                    return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->diffForHumans();
                 })
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (stristr($ruta, 'cerradas')) {
            if ($role) {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                    ->where('tipo_id', '=', 1)
                    ->where('estado_id', '=', 4)
                    ->where('flujovalor_id', '=', 4)
                    ->orwhereBetween('estado_id', [5,6])
                    //->orderBy('posts.prioridad_id', 'desc')
                    ->orderBy('posts.updated_at', 'desc')
                    ->get();
                return datatables()->of($posts)
                    ->addColumn('btn', 'posts.partials.actions')
                    ->addColumn('created_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                    })
                    ->addColumn('updated_at', function ($model) {
                        return $model->name . '' . $model->updated_at->diffForHumans();
                     })
                    ->rawColumns(['btn'])
                    ->toJson();
            } else {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                    ->where('tipo_id', '=', 1)
                    ->where('estado_id', '=', 4)
                    ->where('flujovalor_id', '=', 4)
                    ->where('user_id_updated_at', '=', $user->id)
                    ->orwhereBetween('estado_id', [5,6])
                    //->orderBy('posts.prioridad_id', 'desc')
                    ->orderBy('posts.updated_at', 'desc')
                    ->get();
                return datatables()->of($posts)
                    ->addColumn('btn', 'posts.partials.actions')
                    ->addColumn('created_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                    })
                    ->addColumn('updated_at', function ($model) {
                        return $model->name . '' . $model->updated_at->diffForHumans();
                     })
                    ->rawColumns(['btn'])
                    ->toJson();
            }
        } elseif (stristr($ruta, 'otros')) {
            if ($role) {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                    ->where('posts.tipo_id', '<>', 1)
                    //->orwhere('posts.user_id_created_at', '=', $user->id)
                    //->where('posts.user_id_updated_at', '=', $user->id)
                    ->orderBy('posts.prioridad_id', 'desc')
                    ->orderBy('posts.updated_at', 'desc')
                    ->get();
                return datatables()->of($posts)
                     //->addColumn('btn', 'posts.partials.actions')
                    ->addColumn('btn', 'posts.partials.actions')
                    ->addColumn('created_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                    })
                    ->addColumn('updated_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->diffForHumans();
                     })
                    ->rawColumns(['btn'])
                    ->toJson();
            } else {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                    ->where('posts.tipo_id', '<>', 1)
                    //->where('posts.user_id_created_at', '=', $user->id)
                    ->where('posts.user_id_updated_at', '=', $user->id)
                    ->orderBy('posts.prioridad_id', 'desc')
                    ->orderBy('posts.updated_at', 'desc')
                    ->get();
                return datatables()->of($posts)
                      //->addColumn('btn', 'posts.partials.actions')
                    ->addColumn('btn', 'posts.partials.actions')
                    ->addColumn('created_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                    })
                    ->addColumn('updated_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->diffForHumans();
                     })
                    ->rawColumns(['btn'])
                    ->toJson();
            }
        } elseif (stristr($ruta, 'post')) {
            if ($role) {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                    ->where('tipo_id', '=', 1)
                    ->whereBetween('estado_id', [2,3])
                    ->orWhere('flujovalor_id', '=', 5)
                    ->orderBy('posts.prioridad_id', 'desc')
                    ->orderBy('posts.updated_at', 'asc')
                    //->where('user_id_updated_at', '=', $user->id)
                ->get();
                return datatables()->of($posts)
                    ->addColumn('btn', 'posts.partials.actions')
                    ->addColumn('created_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                    })
                    ->addColumn('updated_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->diffForHumans();
                     })
                    ->rawColumns(['btn'])
                    ->toJson();
            } else {
                $posts = Post::with(['tipo:id,nombre','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                    ->where('tipo_id', '=', 1)
                    ->whereBetween('estado_id', [2,3])
                    ->orWhere('flujovalor_id', '=', 5)
                    ->where('user_id_updated_at', '=', $user->id)
                    ->orderBy('posts.prioridad_id', 'desc')
                    ->orderBy('posts.updated_at', 'asc')
                    //->orwhere('user_id_created_at', '=', $user->id)
                    ->get();
                return datatables()->of($posts)
                    ->addColumn('btn', 'posts.partials.actions')
                    ->addColumn('created_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i');
                    })
                    ->addColumn('updated_at', function ($model) {
                        return Carbon::createFromFormat('Y-m-d H:i:s', $model->updated_at)->diffForHumans();
                     })
                    ->rawColumns(['btn'])
                    ->toJson();
            }
        }
    }

    public function hasLevel($roles)
    {
        $i = 0;
        foreach ($roles as $role) {
            $role = Role::where('name', $role)->get();
            $rol = $role->pluck('level');
            if ($rol[$i] !== null) {
                if ($rol[$i] != null) {
                    $levels[] = $rol[$i];
                }
                $i + 1;
            } else {
                $levels = [];
            }
        }
        return $levels;
    }

    public function activos()
    {
        $activos = Activo::with(['marca:id,nombre', 'modelo:id,nombre', 'personas:id,nombre', 'area:id,nombre', 'estado:id,nombre'])->get();
        return datatables()->of($activos)
            ->addColumn('btn', 'activos.partials.actions')
            ->addColumn('fecha_adquisicion', function ($model) {
                return $model->name . '' . $model->created_at->diffForHumans();
            })
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function servicios()
    {
        $servicios = Servicio::with(['puntajes:id,servicio_id,calificacion', 'estado:id,nombre'])->get();
        return datatables()->of($servicios)
            ->addColumn('btn', 'servicios.partials.actions')
            ->addColumn('created_at', function ($model) {
                return $model->name . '' . $model->created_at->diffForHumans();
            })
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function auditorias()
    {
        $auditorias = Audit::with(['user:id,name,current_rol'])->get();
        return datatables()->of($auditorias)
            ->addColumn('btn', 'auditoria.partials.actions')
            ->addColumn('created_at', function ($model) {
                return $model->name . '' . $model->created_at->diffForHumans();
            })
            ->addColumn('updated_at', function ($model) {
                return $model->name . '' . $model->created_at->diffForHumans();
            })
            ->rawColumns(['btn'])
            ->toJson();
    }
}
