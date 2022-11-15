<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\User;
use PhpParser\Node\Expr\Isset_;

class Filtro extends Component
{
    public $users;
    public $posts;
    public $tipos;
    public $prioridades;
    public $estados;
    public $flujovalores;

    public function render()
    {   
        $users = $this->users;
        $posts = $this->posts;
        $tipos = $this->tipos;
        $prioridades = $this->prioridades;
        $estados = $this->estados;
        $flujovalores = $this->flujovalores;
       
        return view('livewire.components.filtro');
    }
}
