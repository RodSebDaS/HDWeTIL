<?php

namespace App\Http\Livewire\Components;

use App\Models\Post;
use App\Models\Tarea;
use FontLib\Table\Type\post as TypePost;
use Illuminate\Queue\ListenerOptions;
use Livewire\Component;
use Livewire\WithPagination;

class ToDoList extends Component
{
   /*  use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $tareas;
    
    public function updatingSearch()
    {
        $this->resetPage();
    } 
 */
/*     public function mount($post){
        $this->tareas = Tarea::find($post); 
        dd($this->tareas);
    }
 */
    public function render(Post $post)
    {
        return view('livewire.components.to-do-list');
    }
}
