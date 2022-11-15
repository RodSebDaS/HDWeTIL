<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\User;
use App\Models\FlujoValore;
use App\Models\Estado;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Spatie\Permission\Models\Role;

class ModalAccion extends Component
{
    public $post;

    public function render()
    {
        $post = $this->post;
        $estado = Estado::find($post->estado_id);
        $accion = $estado->nombre;
        $user = User::find(Auth::User()->id);
        $user_created_at = User::find($post->user_id_created_at);
        $flujos = FlujoValore::all();
        $role = $user->hasRole('Admin');
        $roles = $user->getRoleNames();
        $userLevels = $this->hasLevel($roles);
        foreach ($flujos as $flujo) {
            $valor = array_search($flujo->posicion, $userLevels);
            if ($post->flujo_id == $valor) {
                $users = User::whereRelation('roles', 'level', '>=', $valor)->get();
                $roles = Role::whereRelation('users', 'level', '>=', $valor)->get();
            }
        }
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
       
        return view('livewire.posts.modal-accion', compact('accion', 'users', 'roles', 'user_created_at'));
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
