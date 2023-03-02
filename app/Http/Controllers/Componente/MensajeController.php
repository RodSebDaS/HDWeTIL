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
use Throwable;

class MensajeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:mensajes')->only('store');
        //$this->middleware('can:mensajes.calificar')->only('update');
    }

    public function index()
    {
        //return view('emails.index');
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
            if (count($nivel) > 0) {
                $users = User::where('current_rol', '=', $nivel_nombre)->get();
                foreach ($users as $user) {
                    Mail::to($user->email)->send($correo);
                }
            }
        
            if ($post->estado_id == 1) {
                return redirect()->route('solicitudes.index')->with('info','Solicitud Nro: '. $post->id . ' registrada con éxito');
            } elseif ($post->estado_id == 4) {
                return redirect()->route('admin.home')->with('info','Solicitud Nro: '. $post->id . ' cerrada con éxito');
            }

        } catch (Throwable $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, Post $post)
    {
        //$request->validate(['puntaje' => 'required', 'puntaje2' => 'required']);
        if ($request != null) {
            $token = $request->get('_token');
            $tokenbDB = Puntaje::where('token', $token)->get();
            if (count($tokenbDB) == 0) {
                $servicio_id = $request->get('servicio_id');
                $servicio_puntaje = $request->get('puntaje');
                $user = $request->get('user');
                $observacion = $request->get('observacion'); 

                $voto = $this->voto($user, $servicio_id);
                if (count($voto) > 0 ) { //Actualizo servicio si está califacado.
                    $puntaje = Puntaje::where('servicio_id', $servicio_id ?? null)
                    ->where('user_id', $user)->update(['servicio_id' =>  $servicio_id , 'calificacion' => $servicio_puntaje, 'observacion' => $observacion, 'token' => $token]);
                } else {
                    Puntaje::create([
                        //'post_id' => $post->id ?? null,
                        'user_id' =>  $user ?? null,
                        'servicio_id' => $servicio_id ?? null,
                        'calificacion' => $servicio_puntaje ?? null,
                        'observacion' => $observacion ?? null,
                        'token' => $request->get('_token') ?? null,
                    ]);
                }
                $servicio_antencion_id = $request->get('servicio_atencion_id');
                $servicio_puntaje2 = $request->get('puntaje2');

                $voto = $this->voto($user, $servicio_antencion_id);
                if (count($voto) > 0 ) { //Actualizo servicio si está califacado.
                    $puntaje = Puntaje::where('servicio_id', $servicio_antencion_id ?? null)
                    ->where('user_id', $user)->update(['servicio_id' =>  $servicio_antencion_id , 'calificacion' => $servicio_puntaje2, 'observacion' => $observacion, 'token' => $token]);
                } else {
                    Puntaje::create([
                        //'post_id' => $post->id ?? null,
                        'user_id' => $user ?? null,
                        'servicio_id' => $servicio_antencion_id ?? null,
                        'calificacion' => $servicio_puntaje2 ?? null,
                        'observacion' => $observacion ?? null,
                        'token' => $request->get('_token') ?? null,
                    ]);
                }
                return (new MailMessage)->view(
                    'emails.calificado'
                );
            } else {
                return (new MailMessage)->view(
                    'emails.recalificado'
                );
            }
        }
    }

    public function voto($user, $servicio_id) //comprueba si el usuario ya calificó el servicio desde api.
    {
        $voto = Puntaje::where('servicio_id', $servicio_id)
            ->where('user_id', $user)
            ->get();
        return $voto;
    }
   
    public function marcarLeidos(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
