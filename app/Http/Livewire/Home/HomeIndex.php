<?php

namespace App\Http\Livewire\Home;

use App\Models\Activo;
use App\Models\Post;
use App\Models\Prioridade;
use App\Models\Puntaje;
use App\Models\Servicio;
use App\Models\Tipo;
use Livewire\Component;
use Livewire\WithPagination;
use Filterizr;

class HomeIndex extends Component
{
    public $posts;
    public $tipos;
    public $prioridades;
    public $servicios;
    public $activos;
    public $tipo_id = 1;
    public $prioridad_id = 1;
    public $ordenar = 'id';
    public $orden = 'desc';
    public $search;
    use WithPagination;

 public function mount()
    {
        
        if (isset($this->posts)) {
            $this->posts;
        } else {
            $posts = Post::where('flujovalor_id', 4)->get();
            $this->orden = 'asc'; 
            $calificacion = $posts->sum('calificacion');
            if ($calificacion = 0 && $calificacion != null ) {
                $this->posts = Post::where('flujovalor_id', 4)
                //->orderBy($this->ordenar, $this->orden)
                //->orderBy('tipo_id', $this->orden)
                //->orderBy('prioridad_id', $this->orden)
                ->orderBy('titulo', $this->orden)
                ->orderBy('calificacion', $this->orden)
                ->orderBy('updated_at', $this->orden)
                ->get();
           } else {
                $this->orden = 'desc'; 
                $this->posts = Post::where('flujovalor_id', 4)
                ->orderBy('calificacion', $this->orden)
                ->orderBy('titulo', $this->orden)
                ->orderBy('updated_at', $this->orden)
                ->get();
           }
            $this->tipos = Tipo::all();
            $this->prioridades = Prioridade::all();
            $this->servicios = Servicio::all();
            $this->activos = Activo::all();
        }
        $this->search;
    }

    public function render()
    {
        if (isset($this->posts)) {
            //$this->posts;
            //dump($this->search);
            if ($this->search !== null) {
                $this->posts = Post::where('flujovalor_id', 4)
                ->orWhere('titulo', 'LIKE', '%' . $this->search . '%')
                ->orderBy('calificacion', 'asc')
                ->get();
            }
            return view('livewire.home.home-index');
        } else {
            $this->posts = Post::where('flujovalor_id', 4)
                ->orwhere('titulo', 'LIKE', '%' . $this->search . '%')
                //->where('tipo_id', $this->tipo_id)
                //->where('prioridad_id', $this->prioridad_id)
                ->orderBy('calificacion', 'desc')
                ->get();
                //->orderBy($this->ordenar, $this->orden)
                //->orderBy('titulo', $this->orden)
                //->orderBy('tipo_id', $this->orden)
                //->orderBy('prioridad_id', $this->orden)
                return view('livewire.home.home-index');
        }
        
    }

    public function orden()
    {
        if ($this->orden == 'asc') {
            $this->orden = 'desc';
        } else {
            $this->orden = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->search;
    }

}
