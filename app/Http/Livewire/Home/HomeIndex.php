<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use App\Models\Prioridade;
use App\Models\Puntaje;
use App\Models\Tipo;
use Livewire\Component;
use Livewire\WithPagination;

class HomeIndex extends Component
{
    public $posts;
    public $tipos;
    public $prioridades;
    public $tipo_id = 1;
    public $prioridad_id = 1;
    public $ordenar = 'id';
    public $orden = 'desc';

 public function mount()
    {
        if (isset($this->posts)) {
            $this->posts;
        } else {
            $this->posts = Post::where('flujovalor_id', 4)
            ->orderBy('calificacion', $this->orden)
            ->get();
            //->orderBy($this->ordenar, $this->orden)
            //->orderBy('titulo', $this->orden)
            //->orderBy('tipo_id', $this->orden)
            //->orderBy('prioridad_id', $this->orden)
            
            $this->tipos = Tipo::all();
            $this->prioridades = Prioridade::all();
        }
    }

    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->search;
    }

    public function render()
    {
        if (isset($this->posts)) {
            $this->posts;
            if (isset($this->search)) {
                $this->posts = Post::where('flujovalor_id', 4)
                ->where('titulo', 'LIKE', '%' . $this->search . '%')
                ->orderBy('calificacion', $this->orden)
                ->get();
                //->orderBy($this->ordenar, $this->orden)
                //->orderBy('titulo', $this->orden)
                //->orderBy('tipo_id', $this->orden)
                //->orderBy('prioridad_id', $this->orden)
        
                return view('livewire.home.home-index');
            }
        } else {
            
        $this->posts = Post::where('flujovalor_id', 4)
            ->where('titulo', 'LIKE', '%' . $this->search . '%')
            ->where('tipo_id', $this->tipo_id)
            ->orwhere('prioridad_id', $this->prioridad_id)
            ->orderBy('calificacion', $this->orden)
            ->get();
            //->orderBy($this->ordenar, $this->orden)
            //->orderBy('titulo', $this->orden)
            //->orderBy('tipo_id', $this->orden)
            //->orderBy('prioridad_id', $this->orden)
            
        }
        
        return view('livewire.home.home-index');
    }

    public function orden()
    {
        if ($this->orden == 'asc') {
            $this->orden = 'desc';
        } else {
            $this->orden = 'asc';
        }
    }
}
