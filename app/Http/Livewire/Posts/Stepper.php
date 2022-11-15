<?php

namespace App\Http\Livewire\Posts;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Level;
use App\Models\Estado;
use App\Models\FlujoValore;
use App\Models\Image;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Dump;
use App\Models\Post;
use Doctrine\Inflector\Rules\English\Rules;
use App\Models\Tipo;
use App\Models\Prioridade;
use App\Models\Proceso;
use Termwind\Components\Dd;

class Stepper extends Component
{
    public $post;
    public $users;
    public $roles;
    public $comentarios;

    /*  protected $rules = [
        'user_id' => 'required',
    ];

    protected $messages = [
        'user_id.required' => 'Debe selecionar almenos un usario.',
    ]; */

    public function derivar($post, $users, $roles, $comentarios)
    {

        // $data = $request->validate(['titulo' => 'required', 'descripcion' => 'required','user_id' => 'required']);

        //$this->validate();
        //$post = $this->post;
        /* $post = Post::find($post);
        $tipo = $post->tipo_id;
        $estado = Estado::find($post->estado_id);
        $flujo = FlujoValore::find($post->flujovalor_id);
        $prioridad = $post->prioridad_id;
        $estado = Estado::find(1);
        $flujo = FlujoValore::find(1);
        $userActual = Auth::User()->id;

        $estado = Estado::find(1);
        $flujo = FlujoValore::find(1);
        $userActual = Auth::User()->id;
 */
        /*  $post->titulo = $request->get('titulo');
        $post->tipo_id = $tipo;
        $post->prioridad_id = $prioridad;
        $post->servicio_id = $request->get('servicio_id');
        $post->activo_id = $request->get('activo_id');
        $post->sla = $request->get('sla');
        $post->estado_id = $estado->id;
        $post->flujovalor_id = $flujo->id;
        $post->user_id = $userActual;
        $post->user_id_update_at = $userActual;
        $post->activa = true;
        $post->descripcion = $request->get('descripcion'); */



        /*       $re_extractImages = '/src=["\']([^ ^"^\']*)/ims';
        preg_match_all($re_extractImages, $post->descripcion, $matches);
        $images = $matches[1];
        foreach ($images as $image) {
            $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);
            $post->images()->create([
                'image_url' => $image_url,
            ]);
        }
        $imagenes = Image::with('Post')->where('post_id', '=', $post->id)->get(); */

        // $user = User::find($userActual);
        // $roles = Role::pluck('name','name')->all();
        // $userRoles = $user->roles->pluck('name','name')->all();
        /*   foreach ($users as $user) {
            $proceso = new Proceso();
            $proceso->post_id = $post->id; */
        /* $proceso->tipo_id = $tipo;
            $proceso->prioridad_id = $prioridad;
            $proceso->estado_id = $estado->id;
            $proceso->flujovalor_id = $flujo->id;
            $proceso->user_id = $userActual;
            $proceso->user_id_update_at = $userActual; */
        /*  $proceso->role = $user;
            $rol = Role::where('name','=',$user)->pluck('level');
            $proceso->level = $rol[0];
            $proceso->save(); */
    }
    /*        foreach ($roles as $Role) {
            $proceso = new Proceso();
            $proceso->post_id = $post->id; */
    /*       $proceso->tipo_id = $tipo;
            $proceso->prioridad_id = $prioridad;
            $proceso->estado_id = $estado->id;
            $proceso->flujovalor_id = $flujo->id;
            $proceso->user_id = $userActual;
            $proceso->user_id_update_at = $userActual;
            $proceso->role = $userRole;
            $rol = Role::where('name','=',$userRole)->pluck('level');*/
    /*     $proceso->level = $rol[0];
            $proceso->save();
        }
        foreach ($imagenes as $imagen) {
            $proceso = new Proceso();
            $proceso->post_id = $post->id; */
    /*   $proceso->tipo_id = $tipo;
            $proceso->prioridad_id = $prioridad;
            $proceso->estado_id = $estado->id;
            $proceso->flujovalor_id = $flujo->id;
            $proceso->user_id = $userActual;
            $proceso->user_id_update_at = $userActual;
            $proceso->role = $userRole;
            $rol = Role::where('name','=',$userRole)->pluck('level'); */
    /*     $proceso->level = $rol[0];
            $image = $imagen->id;
            $proceso->image_id = $image;
            $proceso->save();
        }

       foreach ($comentarios as $comentario) {
            
            $proceso = new Proceso();
            $proceso->post_id = $post->id; */
    /*     $proceso->tipo_id = $tipo;
            $proceso->prioridad_id = $prioridad;
            $proceso->estado_id = $estado->id;
            $proceso->flujovalor_id = $flujo->id;
            $proceso->user_id = $userActual;
            $proceso->user_id_update_at = $userActual;
            $proceso->role = $userRole;
            $rol = Role::where('name','=',$userRole)->pluck('level'); */
    /*            $proceso->level = $rol[0];
            $proceso->comentario_id = $comentario->id;
            $image = $imagen->id;
            $proceso->image_id = $image;
            $proceso->save();
        } 
    } */

    public function render()
    {

        return view('livewire.posts.stepper');
    }
}
