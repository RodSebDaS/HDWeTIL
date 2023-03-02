<?php

namespace App\Http\Livewire\Posts;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Level;
use App\Models\Estado;
use App\Models\FlujoValore;
use App\Models\Image;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Dump;
use App\Models\Post;
use Doctrine\Inflector\Rules\English\Rules;
use App\Models\Tipo;
use App\Models\Prioridade;
use App\Models\Proceso;
use PhpParser\Node\Stmt\If_;
use Termwind\Components\Dd;

use function React\Promise\Stream\first;

class Stepper extends Component
{
    public $post;
    public $users;
    public $roles;
    public $comentarios;
    public $rol;

    public $usuarios;

    public function rol_id()
    {
        //
    }

    public function mount(){
        $user = User::find(Auth::User()->id);
        $this->roles = Role::where('level', '<>', null)->get();
        $this->users = $this->users->except($user->id);
    }

    public function render()
    {
        $user = User::find(Auth::User()->id);
        $rol = $this->rol;
        if ($rol != 'Seleccione una opción...') {
            $rol =  Role::where('id', $rol)->get();
            $role_name = $rol[0]->name ?? null;
            if ($role_name != null) {
                $this->users = User::where('current_rol', $role_name)->get();
                $this->users = $this->users->except($user->id);
            }
        }
       
        return view('livewire.posts.stepper');
    }
}
