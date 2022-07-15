<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Database\Concerns\ParsesSearchPath;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    public $search;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render(){
       
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
        ->orWhere('id', 'LIKE', '%' . $this->search . '%')
        ->paginate();

        return view('livewire.admin.users-index', compact('users'));
    }
}