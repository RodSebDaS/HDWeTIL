<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Hamcrest\Number\OrderingComparison;
use Illuminate\Database\Concerns\ParsesSearchPath;
use Livewire\Component;
use Livewire\WithPagination;
use Monolog\ResettableInterface;

class UsersIndex extends Component
{
  /* use WithPagination;
    public $search;
    public $ordenar = 'id';
    public $direccion = 'asc';

    protected $paginationTheme = 'bootstrap';

     public function updatingSearch()
    {
        $this->resetPage();
    }
 */
    public function render()
    {
        
        /*$users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('id', 'LIKE', '%' . $this->search . '%')
            ->orderBy($this->ordenar, $this->direccion)
            ->paginate();
            $this->updatingSearch();*/ 
        $users = User::all();
        return view('livewire.admin.users-index', compact('users'));
    } 

    /*public function orden($ordenar)
    {
        if ($this->ordenar == $ordenar) {

            if ($this->direccion == 'asc') {
                $this->direccion = 'desc';
            } else {
                $this->direccion = 'asc';
            }
        } else {
            $this->ordenar = $ordenar;
            $this->direccion = 'asc';
        }
    }*/
}
