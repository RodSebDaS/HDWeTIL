<?php

namespace App\Http\Livewire\Solicitudes;

use Livewire\Component;
use App\Models\Post;
use App\Models\Estado;
use App\Models\level;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use HasRoles;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

use function PHPUnit\Framework\arrayHasKey;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class SolicitudesIndex extends Component
{
    public function render()
    {
        return view('livewire.solicitudes.solicitudes-index');
       /*  $user = User::find(Auth::User()->id);
        $role = $user->hasRole('Admin');
        if ($role) {
            $solicitudes = Post::with(['Estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                ->get();
            return view('livewire.solicitudes.solicitudes-index', compact('solicitudes'));
        } else {
            $roles = $user->getRoleNames();
            $userLevels = $this->hasLevel($roles);
            if (!empty($userLevels)) {
                $levels = Level::all();
                foreach ($levels as $level) {
                    $valor = array_search($level->posicion, $userLevels);
                    if ($valor !== false) {
                        if (($level->posicion == $userLevels[$valor])) {
                            $rolSesion = $user->current_rol;
                            if (!empty($rolSesion)) {
                                $rol = Role::where('name', '=', $rolSesion)->get()->pluck('level')->toArray();
                                if ($level->posicion == $rol[0]) {
                                    $solicitudes = Post::with(['Estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                                        ->where('estado_id', '=', (Estado::first()->id))
                                        ->orwhere('user_id', '=', $user->id)
                                        ->get();
                                    return view('livewire.solicitudes.solicitudes-index', compact('solicitudes'));
                                }
                            } else {
                                $solicitudes = Post::with(['Estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                                        ->where('estado_id', '=', (Estado::first()->id))
                                        ->orwhere('user_id', '=', $user->id)
                                        ->get();
                                return view('livewire.solicitudes.solicitudes-index', compact('solicitudes'));
                            }
                        }
                    }  
                }
            } else {
                $solicitudes = Post::with(['Estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
                    ->where('user_id', '=', $user->id)
                    ->get();
                return view('livewire.solicitudes.solicitudes-index', compact('solicitudes'));
            }
        } */
    }

  /*   public function hasLevel($roles)
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
    } */
}