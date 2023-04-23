<?php

namespace App\Http\Livewire\Components;

use App\Models\Post;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MultipleItemsFoundException;
use Livewire\Component;
use App\Models\Comentario;
use App\Models\Notification as ModelsNotification;
use Illuminate\Notifications\Notifiable\markAsRead;

class Notificacion extends Component
{
    public $notificaciones;
    public $comentarios;
    public $post;

    public function marcarLeido($id)
    {
        $notificaciones = auth()->user()->unreadNotifications;
        foreach ($notificaciones as $notificacion) {
            if ($notificacion->data['id'] == $id) {
                $notificacion->markAsRead();
                return redirect()->route('solicitudes.show', $id);
            }
        }
    }

    public function marcarLeidos()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function marcarLeidoComentario($id, $post)
    {
        $comentario = Comentario::find($id);
        if (!is_null($comentario)) {
            $comentario->update(['read_at' => now()]);
            return redirect()->route('solicitudes.show', $post);
        }
    }

    public function marcarLeidosComentarios()
    {
        $comentarios = Comentario::with(['notificacion:id,notifiable_id','post:id,titulo,user_id_created_at,user_name_created_at,user_id_updated_at,user_name_updated_at','user:id,name,profile_photo_path'])
        ->where('user_id', '!=', auth()->user()->id)
        ->where('read_at', null)
        ->get();

        if (!is_null($comentarios)) {
            foreach ($comentarios as $comentario) {
                $comentario->update(['read_at' => now()]);
            }
        }
        return redirect()->back();
    }

    public function render()
    {
        $this->notificaciones = auth()->user()->unreadNotifications;
        $this->comentarios = Comentario::with(['notificacion:id,notifiable_id','post:id,titulo,user_id_created_at,user_name_created_at,user_id_updated_at,user_name_updated_at','user:id,name,profile_photo_path'])
        ->where('user_id', '!=', auth()->user()->id)
        ->where('read_at', null)
        ->get();

        return view('livewire.components.notificacion');
    }
}
