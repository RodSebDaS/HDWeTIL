<?php

namespace App\Http\Livewire\Estadisticas;

use App\Models\Activo;
use App\Models\Estado;
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
    public $pendientes;
    public $incidencias;
    public $asignadas;

    public function render()
    {
        $userActual = Auth::User();
        if ($userActual !== null && $userActual->current_rol !== null) {
            if ($userActual->current_rol == "Admin") {
                $this->users = User::count();
                $this->activos = Activo::count();
                $this->servicios = Servicio::count();
                $this->solicitudes = Post::where('estado_id', 1)->count();
                $this->pendientes = Post::where('tipo_id', 1)->whereBetween('estado_id', [1,3])->orWhere('flujovalor_id', '=', 5)->count();
                $this->incidencias = Post::where('tipo_id', 1)->whereBetween('estado_id', [2,3])->orWhere('flujovalor_id', '=', 5)->count();
                $this->asignadas = ProcesosPostsUser::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                ->where('estado_id', '=', 3)
                ->where('user_id_asignated_at', '=', $userActual->id)
                ->groupBy('user_id_asignated_at', 'id')
                ->count();
                return view('livewire.estadisticas.estadisticas-index');

            } elseif($userActual->current_rol == "Alumno"){
                $this->solicitudes = Post::where('user_id_created_at', '=', $userActual->id)->count();
                return view('livewire.estadisticas.estadisticas-index');

            }elseif($userActual->current_rol !== "Alumno"){
                $this->activos = Activo::count();
                $this->servicios = Servicio::count();
                $this->solicitudes = Post::where('estado_id', 1)->count();
                $this->pendientes = Post::where('tipo_id', 1)->whereBetween('estado_id', [1,3])->orWhere('flujovalor_id', '=', 5)->count();
                $this->incidencias = Post::where('tipo_id', 1)->whereBetween('estado_id', [2,3])->orWhere('flujovalor_id', '=', 5)->count();
                $this->asignadas = ProcesosPostsUser::with(['estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                ->where('estado_id', '=', 3)
                ->where('user_id_asignated_at', '=', $userActual->id)
                ->groupBy('user_id_asignated_at', 'id')
                ->count();
                return view('livewire.estadisticas.estadisticas-index');
            }
        }
    }
}
