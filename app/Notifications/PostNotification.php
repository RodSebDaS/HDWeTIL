<?php

namespace App\Notifications;

use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Broadcast;
use Livewire\WithPagination;

class PostNotification extends Notification implements ShouldQueue//, ShouldBroadcast
{
    use Queueable;
    //use Notifiable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
    return ['database'];
    }
    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'id' => $this->post->id,
            'titulo' => $this->post->titulo,
            'estado' => $this->post->estado->nombre,
            'flujo' => $this->post->flujovalor->nombre,
            'descripcion' => $this->post->descripcion,
            'created_at'  => $this->post->created_at,
        ];
    }

    /*public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id' => $this->post->id,
            'titulo' => $this->post->titulo,
            'estado' => $this->post->estado->nombre,
            'flujo' => $this->post->flujovalor->nombre,
            'descripcion' => $this->post->descripcion,
            'created_at'  => $this->post->created_at,
        ]);
    }*/
}
