<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use App\Models\Estado;
use App\Models\User;
use App\Models\level;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use HasRoles;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Throwable;

class PostsIndex extends Component
{

    public function render()
    {
        try {
            $ruta = FacadesRoute::currentRouteName();
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return view('livewire.posts.posts-index', compact('ruta'));
    }
}