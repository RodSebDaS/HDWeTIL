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

class PostsIndex extends Component
{
    public function render()
    {
        return view('livewire.posts.posts-index');
    }
}