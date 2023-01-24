<?php

namespace App\Http\Livewire\Components;

use Illuminate\Database\Console\Migrations\RefreshCommand;
use Livewire\Component;

class Notificacion extends Component
{
    public $notificaciones;

    public function marcarLeido($id){
        $notificaciones = auth()->user()->unreadNotifications;
        foreach ($notificaciones as $notificacion) {
            if ($notificacion->data['id'] == $id) {
                $notificacion->markAsRead();
                return redirect()->route('solicitudes.show', $id);
            }
        }
    }

    public function marcarLeidos(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function render()
    {
        $this->notificaciones = auth()->user()->unreadNotifications;
        return view('livewire.components.notificacion');
    }
}
