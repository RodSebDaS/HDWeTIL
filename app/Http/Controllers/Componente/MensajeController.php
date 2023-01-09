<?php

namespace App\Http\Controllers\Componente;

use App\Http\Controllers\Controller;
use App\Mail\MensajesMailable;
use App\Models\Estado;
use App\Models\Level;
use App\Models\Post;
use App\Models\Puntaje;
use App\Models\Servicio;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter;
use Symfony\Contracts\Service\ResetInterface;

class MensajeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:admin.mensajes')->only('store');
        //$this->middleware('can:admin.mensajes.calificar')->only('update');
    }

    public function index()
    {
        return view('emails.index');
    }

    public function store(Request $request, Post $post)
    {
        try {
            $correo = new MensajesMailable($post);
            $user_created_at = User::find($post->user_id_created_at);
            $user_created_at_email = $user_created_at->email;
            Mail::to($user_created_at_email)->send($correo);
            $nivel = Role::where('level', '=', 1)->get();
            $nivel_nombre = $nivel[0]->name ?? null;
            if (!is_null($nivel_nombre)) {
                $users = User::where('current_rol', '=', $nivel_nombre)->get();
                foreach ($users as $user) {
                    Mail::to($user->email)->send($correo);
                }
            }
        } catch (\Throwable $e) {
            return back()->withError($e->getMessage())->withInput();
        }
        if ($post->estado_id == 1) {
            return redirect()->route('solicitudes.index')->with('info', 'Solicitud creada con éxito!');
        } else {
            return redirect()->route('solicitudes.index')->with('info', 'Solicitud cerrada con éxito!');
        }
    }

    public function update(Request $request, Post $post)
    {
        //$request->validate(['puntaje' => 'required', 'puntaje2' => 'required']);
        if ($request != null) {
            $servicio_id = $request->get('servicio_id');
            $servicio_puntaje = $request->get('puntaje');
            Puntaje::create([
                'post_id' => $post->id ?? null,
                'user_id' => Auth::User()->id ?? null,
                'servicio_id' => $servicio_id ?? null,
                'calificacion' => $servicio_puntaje ?? null,
                'observacion' => $request->get('observacion') ?? null,
            ]);

            $servicio_antencion_id = $request->get('servicio_atencion_id');
            $servicio_puntaje2 = $request->get('puntaje2');
            Puntaje::create([
                'post_id' => $post->id ?? null,
                'user_id' => Auth::User()->id ?? null,
                'servicio_id' => $servicio_antencion_id ?? null,
                'calificacion' => $servicio_puntaje2 ?? null,
                'observacion' => $request->get('observacion') ?? null,
            ]);
            return (new MailMessage)->view(
                'emails.calificado'
            );
        }
    }
}
