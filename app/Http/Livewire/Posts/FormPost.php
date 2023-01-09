<?php

namespace App\Http\Livewire\Posts;

use App\Models\Activo;
use App\Models\Prioridade;
use App\Models\Servicio;
use App\Models\Post;
use App\Models\Tipo;
use App\Models\Estado;
use App\Models\Tarea;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Modal;
use Livewire\Component;
use Livewire\WithPagination;

class FormPost extends Component
{
    public $content;
    public $post;
    public $accion;
    public $respuesta;
   /*  public $nombre;
    public $descripcions;
    public $respuesta;
    public $tarea;*/
    //public $observacion;

   /*  use WithPagination;
    protected $paginationTheme = 'bootstrap';
   
    public function updatingSearch()
    {
        $this->resetPage();
    }  */

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comentarios = $post->comentarios;
    }

  /*  public function create(Tarea $tarea)
    {
       // dump($tarea);
   
    }

    public function edit(Tarea $tarea)
    {
       if ($tarea !== null) {
            dd($tarea);
            $tarea->update();
        }
    }

    public function save(Tarea $tarea)
    {
        //
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->postTareas()->delete();
        return back();
    } */

    public function render(Post $post)
    {
       
        $post = $this->post;
        $accion = $this->accion;
        //$estado = Estado::find($post->estado_id);
        //$accion = $estado->nombre;
        $prioridades = Prioridade::all();
        $servicios = Servicio::all();
        $activos = Activo::all();
        $tipos = Tipo::all();
        $comentarios = $this->comentarios;
        //$tareas = $post->postTareas()->orderBy('id')->paginate(5);

        return view('livewire.posts.form-post', compact('accion', 'post', 'tipos', 'prioridades', 'servicios', 'activos', 'comentarios'));
    }
}
