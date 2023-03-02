<?php

namespace App\Http\Livewire\Solicitudes;

use Livewire\Component;

class SolicitudesCreate extends Component
{
    public function save(){
        $this->emit('storeSolicitud');
    }

    public function render()
    {
        return view('livewire.solicitudes.solicitudes-create');
    }
}
