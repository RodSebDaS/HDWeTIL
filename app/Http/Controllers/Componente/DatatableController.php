<?php

namespace App\Http\Controllers\Componente;

use App\Http\Controllers\Controller;
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
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Yajra\DataTables\DataTablesServiceProvider;
use Illuminate\Support\Facades\Route;

class DatatableController extends Controller
{
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
        if ($role) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->get();
            return datatables()->of($solicitudes)
                ->addColumn('btn', 'solicitudes.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return $model->name . '' . $model->created_at->diffForHumans();
                })
                ->addColumn('sla', function ($model) {
                    return $model->name . '' . $model->sla->diffForHumans();
                })
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (!empty($userLevels)) {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
               /* ->where('estado_id', '=', Estado::first()->id) */
                ->get();
            return datatables()->of($solicitudes)
                ->addColumn('btn', 'solicitudes.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return $model->name . '' . $model->created_at->diffForHumans();
                })
                ->addColumn('sla', function ($model) {
                    return $model->name . '' . $model->sla->diffForHumans();
                })
                ->rawColumns(['btn'])
                ->toJson();
        } else {
            $solicitudes = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('user_id_created_at', '=', $user->id)
                ->get();
            return datatables()->of($solicitudes)
                ->addColumn('btn', 'solicitudes.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return $model->name . '' . $model->created_at->diffForHumans();
                })
                ->addColumn('sla', function ($model) {
                    return $model->name . '' . $model->sla->diffForHumans();
                })
                ->rawColumns(['btn'])
                ->toJson();
        }
    }
    public function posts(Request $request)
    {
        $user = User::find(Auth::User()->id);
        $ruta = $request->headers->get('referer');
        if (stristr($ruta, 'atendidas')) {
            $estado = Estado::find(2);
            $posts = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre', 'servicio:id,nombre', 'activo:id,nombre'])
                ->where('estado_id', '=', $estado->id)
                ->where('user_id_updated_at', '=', $user->id)
                ->get();
            return datatables()->of($posts)
                ->addColumn('btn', 'posts.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return $model->name . '' . $model->created_at->diffForHumans();
                })
                ->addColumn('sla', function ($model) {
                    return $model->name . '' . $model->sla->diffForHumans();
                })
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (stristr($ruta, 'asignadas')) {
            $estado = Estado::find(3);
            $posts = ProcesosPostsUser::with(['post:id,titulo,servicio_id,activo_id','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
            ->where('estado_id', '=', $estado->id)
            ->where('user_id_asignated_at', '=', $user->id)
            ->groupBy('user_id_asignated_at','id')
            ->get();
            return datatables()->of($posts)
                ->addColumn('btn', 'posts.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return $model->name . '' . $model->created_at->diffForHumans();
                })
                ->addColumn('sla', function ($model) {
                    return $model->name . '' . $model->sla->diffForHumans();
                })
                ->rawColumns(['btn'])
                ->toJson();
        } elseif (stristr($ruta, 'derivadas')) {
            $estado = Estado::find(3);
            $posts = ProcesosPostsUser::with(['user:id,name','post:id,titulo','estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre','servicio:id,nombre', 'activo:id,nombre'])
            ->where('estado_id', '=', $estado->id)
            ->where('user_id_updated_at', '=', $user->id)
            ->get();
            return datatables()->of($posts)
                ->addColumn('btn', 'posts.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return $model->name . '' . $model->created_at->diffForHumans();
                })
                ->addColumn('sla', function ($model) {
                    return $model->name . '' . $model->sla->diffForHumans();
                })
                ->rawColumns(['btn'])
                ->toJson();
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
}


        /*     if ($role) {
            $posts = Post::with(['Estado:id,nombre','prioridad:id,nombre','flujovalor:id,nombre','servicio:id,nombre','activo:id,nombre'])
                ->where('estado_id', '=', 2)
                ->get();
            return datatables()->of($posts)
                ->addColumn('btn', 'posts.partials.actions')
                ->addColumn('created_at', function ($model) {
                    return $model->name . '' . $model->created_at->diffForHumans();})
                ->addColumn('sla', function ($model) {
                    return $model->name . '' . $model->sla->diffForHumans();})
                ->rawColumns(['btn'])
                ->toJson();
        } else {
            $roles = $user->getRoleNames();
            $userLevels = $this->hasLevel($roles);
            if (!empty($userLevels)) {
                $levels = Level::all();
                foreach ($levels as $level) {
                    $valor = array_search($level->posicion, $userLevels);
                    if ($valor !== false) {
                        if (($level->posicion == $userLevels[$valor])) {
                            $estados = Estado::where('id', '>=', '2')->get();
                            foreach ($estados as $estado) {
                                if ($estado->id == $level->posicion) {
                                    $rolSesion = $user->current_rol;
                                    if (!empty($rolSesion)) {
                                        $rol = Role::where('name', '=', $rolSesion)->get()->pluck('level')->toArray();
                                        if ($level->posicion == $rol[0]) {
                                            $posts = Post::with(['Estado:id,nombre','prioridad:id,nombre','flujovalor:id,nombre','servicio:id,nombre','activo:id,nombre'])
                                                ->where('estado_id', '=', $estado->id)
                                                ->orwhere('user_id_update_at', '=', $user->id)
                                                ->get();
                                            return datatables()->of($posts)
                                                ->addColumn('btn', 'posts.partials.actions')
                                                ->addColumn('created_at', function ($model) {
                                                    return $model->name . '' . $model->created_at->diffForHumans();})
                                                ->addColumn('sla', function ($model) {
                                                    return $model->name . '' . $model->sla->diffForHumans();})
                                                ->rawColumns(['btn'])
                                                ->toJson();
                                        }
                                    } else {
                                        $posts = Post::with(['Estado:id,nombre','prioridad:id,nombre','flujovalor:id,nombre','servicio:id,nombre','activo:id,nombre'])
                                            ->where('estado_id', '=', $estado->id)
                                            ->orwhere('user_id_update_at', '=', $user->id)
                                            ->get();
                                        return datatables()->of($posts)
                                            ->addColumn('btn', 'posts.partials.actions')
                                            ->addColumn('created_at', function ($model) {
                                                return $model->name . '' . $model->created_at->diffForHumans();})
                                            ->addColumn('sla', function ($model) {
                                                return $model->name . '' . $model->sla->diffForHumans();})
                                            ->rawColumns(['btn'])
                                            ->toJson();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } 
    }*/

   /*  
}*/
//agregar un campo mas user_id_update_at y cambiar el otro por user_id_created_at.
//recorrer por procesos para obtener los atendidos y q no desaparescan.
