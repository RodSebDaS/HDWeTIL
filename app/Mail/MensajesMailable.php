<?php

namespace App\Mail;

use App\Models\Servicio;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;

class MensajesMailable extends Mailable
{
    use Queueable, SerializesModels, Notifiable;
    public $subject;
    public $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->subject = 'Seguimiento de tu solicitud con asunto: ' . $post->titulo;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->post->estado_id == 1) {
            return $this->view('emails.mensajes');
        } else {
            //$this->servicio = Servicio::find($this->post->servicio_id); // servicio afectado
            $this->servicio = Servicio::find(6); //Usabilidad de Sistema
            $servicio =  $this->servicio;
            $servicio_atencion = Servicio::where('id','=','1')->get(); // servicio de atencion
            $user = $this->post->user_id_created_at; // usuario
            return $this->view('emails.calificacion', compact('servicio','servicio_atencion','user'));
        }
    }
}
