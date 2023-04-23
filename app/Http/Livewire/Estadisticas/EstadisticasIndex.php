<?php

namespace App\Http\Livewire\Estadisticas;

use App\Models\Activo;
use App\Models\Estado;
use App\Models\FlujoValore;
use App\Models\Post;
use App\Models\ProcesosPostsUser;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EstadisticasIndex extends Component
{
    public $users;
    public $activos;
    public $servicios;
    public $solicitudes;
    public $solicitudesSinAtender;
    public $solicitudesAtendidas;
    public $solicitudesCerradas;
    public $solicitudesRechazadas;
    public $pendientes;
    public $incidencias;
    public $asignadas;
    public $derivadas;
    public $estado;
    public function render()
    {
        $user = Auth::User();
        $userActual = Auth::User()->id;
        if ($userActual !== null && $user ->current_rol !== null) {
            if ($user->current_rol == "Admin") {
                $this->users = User::count();
                $this->activos = Activo::count();
                $this->servicios = Servicio::count();
                $this->solicitudes = Post::count();
                //$this->solicitudesSinAtender= Post::where('estado_id', 1)->count();
                $this->solicitudesSinAtender= Post::where('estado_id', 1)->count();
                  
                //->orwhere('user_id_created_at', '=', $userActual)
               /*  $this->pendientes = Post::where('tipo_id', 1)->where('user_id_updated_at', '=', $userActual)
                    ->whereBetween('estado_id', [2,3])->orwhere('flujovalor_id', '=', 5)->count(); */
                $this->solicitudesAtendidas = Post::whereBetween('estado_id', [2,3])->count(); 
                    //->orwhere('user_id_created_at', '=', $user->id)
                //$this->pendientes = Post::where('tipo_id', 1)->whereBetween('estado_id', [2,3])->orWhere('flujovalor_id', '=', 5)->count();
                //$this->incidencias = Post::where('tipo_id', 1)->whereBetween('estado_id', [2,6])->orWhere('flujovalor_id', [2,7])->count();
                /* $this->asignadas = ProcesosPostsUser::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                ->where('estado_id', '=', 3) 
                //->where('user_id_asignated_at', '=', $userActual)
                //->groupBy('user_id_asignated_at', 'id')
                ->count();*/
                $this->derivadas = Post::where('estado_id', 3)->count(); 
                $this->solicitudesRechazadas = Post::where('estado_id', 6)->count();
                $this->solicitudesCerradas = Post::where('estado_id', 4)->count();
                return view('livewire.estadisticas.estadisticas-index');

            } elseif($user->current_rol == "Alumno" ){
                $this->solicitudes = Post::where('user_id_created_at', '=', $userActual)->count();
                $this->solicitudesSinAtender= Post::where('estado_id', 1)
                ->where('user_id_created_at', '=', $userActual)
                //->where('flujovalor_id', 1)
                ->count();              
                $this->solicitudesAtendidas = Post::whereBetween('estado_id', [2,3])
                ->where('user_id_created_at', '=', $userActual)
                //->orwhere('estado_id', 3)
                ->count();               
                $this->solicitudesCerradas = Post::where('estado_id', 4)
                ->where('user_id_created_at', '=', $userActual)
                ->count();        
                $this->solicitudesRechazadas = Post::where('estado_id', 6)
                ->where('user_id_created_at', '=', $userActual)
                ->count();
                return view('livewire.estadisticas.estadisticas-index');

            } elseif($user->current_rol == "Mesa de Ayuda"){
                $this->activos = Activo::count();
                $this->servicios = Servicio::count();
                $this->solicitudes = Post::where('flujovalor_id', '=', FlujoValore::first()->id)
                    ->orwhere('user_id_updated_at', '=', $userActual)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    ->count();    
                //$this->solicitudesSinAtender= Post::where('estado_id', 1)->count();  
                $this->solicitudesSinAtender = Post::where('estado_id', 1)
                    //->orwhere('user_id_updated_at', '=', $user->id)
                    ->orwhere('user_id_created_at', '=', $user->id)   
                    ->count();
                //->orwhere('user_id_created_at', '=', $userActual)
               /*  $this->pendientes = Post::where('tipo_id', 1)->where('user_id_updated_at', '=', $userActual)
                    ->whereBetween('estado_id', [2,3])->orwhere('flujovalor_id', '=', 5)->count(); */
                $this->solicitudesAtendidas = Post::whereBetween('estado_id', [2,3])
                    ->where('user_id_updated_at', '=', $userActual)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    ->count();   
                /* $this->incidencias = Post::where('tipo_id', 1)
                    //->whereBetween('estado_id', [2,3])
                    //->orwhere('flujovalor_id', '=', 5)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    ->orwhere('user_id_updated_at', '=', $userActual)
                    ->count(); */
                /* $this->asignadas = ProcesosPostsUser::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                */             
                $this->asignadas = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                    ->where('user_id_asignated_at', '=', $userActual)
                    ->where('estado_id', '=', 3)
                //->groupBy('user_id_asignated_at', 'id')
                    ->count();
                /* $this->derivadas = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                    ->where('estado_id', '=', 3)
                    ->count(); */
                $this->solicitudesRechazadas = Post::where('estado_id', 6)
                    ->where('user_id_updated_at', '=', $userActual)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    ->count();
                return view('livewire.estadisticas.estadisticas-index');
            } elseif ($user->current_rol == "Soporte Técnico" || $user->current_rol == "Especialista") {
                /* 
                    $this->activos = Activo::count();
                    $this->servicios = Servicio::count();
                    $this->solicitudes = Post::where('estado_id', 1)->where('user_id_created_at', '=', $userActual)->count();
                    $this->pendientes = Post::where('tipo_id', 1)
                        ->where('user_id_asignated_at', '=', $userActual)
                        ->whereBetween('estado_id', [2,3])
                        ->orwhere('flujovalor_id', '=', 5)
                        ->count();
                    $this->incidencias = Post::where('tipo_id', 1)
                    ->whereBetween('estado_id', [2,3])
                    ->orwhere('flujovalor_id', '=', 5)
                    ->where('user_id_asignated_at', '=', $userActual)
                    ->count();
                    $this->asignadas = ProcesosPostsUser::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                    ->where('tipo_id', 1)
                    ->where('estado_id', '=', 3)
                    ->where('user_id_asignated_at', '=', $userActual)
                    //->groupBy('user_id_asignated_at', 'id')
                    ->count();
                    $this->derivadas = ProcesosPostsUser::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                    ->where('tipo_id', 1)
                    ->where('estado_id', '=', 3)
                    ->where('user_id_asignated_at', '=', $userActual)
                    ->count();
                    $this->solicitudesRechazadas = Post::where('user_id_created_at', '=', $userActual)
                    ->where('estado_id',6)
                    ->count(); 
                */
                $this->activos = Activo::count();
                $this->servicios = Servicio::count();
                $this->solicitudes = Post::where('user_id_asignated_at', '=', $userActual)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    ->orwhere('user_id_updated_at', '=', $userActual)
                    ->count();
                $this->solicitudesSinAtender = Post::where('estado_id', 1)
                    //where('flujovalor_id', 1)
                    ->where('user_id_asignated_at', '=', $userActual)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    //->orwhere('user_id_updated_at', '=', $userActual)
                    ->count();   
               /*  $this->pendientes = Post::where('tipo_id', 1)->where('user_id_updated_at', '=', $userActual)
                    ->whereBetween('estado_id', [2,3])->orwhere('flujovalor_id', '=', 5)->count(); */
                $this->solicitudesAtendidas = Post::whereBetween('estado_id', [2,3])
                    ->where('user_id_asignated_at', '=', $userActual)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    ->orwhere('user_id_updated_at', '=', $userActual)
                    ->count();   
                /* $this->incidencias = Post::where('tipo_id', 1)
                    //->whereBetween('estado_id', [2,3])
                    //->orwhere('flujovalor_id', '=', 5)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    ->orwhere('user_id_updated_at', '=', $userActual)
                    ->count(); */
                /* $this->asignadas = ProcesosPostsUser::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                */             
                $this->asignadas = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                    ->where('estado_id', '=', 3)
                    ->where('user_id_asignated_at', '=', $userActual)
                    //->groupBy('user_id_asignated_at', 'id')
                    ->count();
                /* $this->derivadas = Post::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                    ->where('estado_id', '=', 3)
                    ->count(); */
                $this->solicitudesRechazadas = Post::where('estado_id',6)
                    //->where('user_id_asignated_at', '=', $userActual)
                    ->where('user_id_updated_at', '=', $userActual)
                    ->orwhere('user_id_created_at', '=', $userActual)
                    ->count();
                return view('livewire.estadisticas.estadisticas-index');
            }
        }
    }
}
