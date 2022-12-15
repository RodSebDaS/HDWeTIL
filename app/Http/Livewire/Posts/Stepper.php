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
use Termwind\Components\Dd;

class Stepper extends Component
{
    public $post;
    public $users;
    public $roles;
    public $comentarios;

    public function derivar($post, $users, $roles, $comentarios)
    {
    }
    public function render()
    {
        return view('livewire.posts.stepper');
    }
}
