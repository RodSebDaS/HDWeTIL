<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Queue\Listener;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Livewire\Component;
use Illuminate\Support\Arr;

class Menu extends Component
{
    public $user;
    public $roles = null;
    public $rol;
  
    public function mount()
    {
        $this->user = User::find(Auth::User()->id);
        $this->rol = $this->user->current_rol;
    }

    public function render()
    {
        $user = User::find(Auth::User()->id);;
        $roles = Arr::sort($user->getRoleNames(), SORT_NATURAL | SORT_FLAG_CASE);
        $this->roles = $roles;
        $user->current_rol = $this->rol;
        $user->save();

        return view('livewire.admin.menu');
    }
}
