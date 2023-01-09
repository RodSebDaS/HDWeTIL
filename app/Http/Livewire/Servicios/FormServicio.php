<?php

namespace App\Http\Livewire\Servicios;

use App\Models\Estado;
use App\Models\Puntaje;
use App\Models\Servicio;
use Livewire\Component;

class FormServicio extends Component
{
    public $servicio;
    public $accion = null;
    public $votos;

    public function render()
    {
        //$servicios = Servicio::all();
        $estados = Estado::where('id','>',8)->get();
        $puntaje = Puntaje::where('servicio_id', $this->servicio->id ?? null)->get();
        return view('livewire.servicios.form-servicio', compact('estados','puntaje'));
    }
}
