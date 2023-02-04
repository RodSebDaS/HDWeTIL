<?php

namespace App\Http\Livewire\Components;

use App\Models\Post;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MultipleItemsFoundException;
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
