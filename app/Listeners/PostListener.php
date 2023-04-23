<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\PostNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\Permission\Models\Role;
use App\Models\Post;
use App\Models\ProcesosPostsUser;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Livewire\WithPagination;

class PostListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $nivel = Role::where('level', '=', 1)->get();
        $nivel_nombre = $nivel[0]->name ?? null;
        //$comentarios = $event->post->comentarios;
        //dump(($event->post->comentarios));
        //Enviamos notificacion cuando se crea la solicitud a los usuarios del nivel 1
        if ($event->post->estado_id == 1) {
            if (!is_null($nivel_nombre)) {
                $users = User::where('current_rol', '=', $nivel_nombre)->get();
                foreach ($users as $user) {
                    Notification::send($user, new PostNotification($event->post));
                }
             
            }
        //Enviamos notificacion cuando se asigna/deriva la solicitud al/los usuario/s
        } elseif ($event->post->estado_id == 3) {
            $posts = ProcesosPostsUser::where('post_id', $event->post->id)
                ->where('estado_id', 3)->pluck('user_id_asignated_at')->toArray();
            $users = array_unique($posts);
            foreach ($users as $user) {
                $user = User::where('id', '=', $user)->get();
                Notification::send($user, new PostNotification($event->post));
            }
        }
        //Enviamos notificacion cuando se cierra la solicitud al usuario que la creo
        elseif ($event->post->flujovalor_id == 4) {
                $user = User::where('id', '=', $event->post->user_id_created_at)->get();
                Notification::send($user, new PostNotification($event->post));
        }
        //Enviamos notificacion cuando se rechaza la solicitud al usuario que la creo
        elseif ($event->post->estado_id == 6) {
            $user = User::where('id', '=', $event->post->user_id_created_at)->get();
            Notification::send($user, new PostNotification($event->post));
        }
        
        return redirect()->back();
    }
}
