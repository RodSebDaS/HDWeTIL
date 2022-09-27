<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use App\Models\Activo;
use App\Models\Estado;
use App\Models\Prioridade;
use App\Models\FlujoValore;
use App\Models\Post;
use App\Models\Persona;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Idn;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:admin.users.index')->only('index');
       // $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    public function index()
    {
        /* $posts = Post::with(['Estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
            ->where('estado_id', '=', (Estado::first()->id))
            ->get(); */

        return view('admin.solicitudes.index');
    }

    public function create()
    {
        $prioridades = Prioridade::all();
        $servicios = Servicio::all();
        $activos = Activo::all();
        $tipos = Tipo::all();
        $posts = Post::with(['Estado:id,nombre', 'prioridad:id,nombre', 'flujovalor:id,nombre'])
            ->where('estado_id', '=', (Estado::first()->id))
            ->get();
        return view('admin.solicitudes.create', compact('posts', 'prioridades', 'servicios', 'activos', 'tipos'));
        //return view('livewire.admin.formPost', compact('posts', 'prioridades', 'servicios', 'activos', 'tipos'));
    }

    public function store(Request $request)

    {
        $data = $request->validate(['titulo' => 'required', 'descripcion' => 'required']);
    
        $post = new Post();
        $post->tipo_id = "2"; // $request->get('tipo');
        $post->titulo = $request->get('titulo');
        $post->prioridad_id = $request->get('prioridad_id');
        $post->servicio_id = $request->get('servicio_id');
        $post->activo_id = $request->get('activo_id');
        $post->sla = $request->get('sla');
        $post->estado_id = "1";
        $post->flujovalor_id = "1";
        $post->user_id = Auth::User()->id;
        $post->activa = true;
        $post->descripcion = $request->get('descripcion');
        $post->save();

        $re_extractImages = '/src=["\']([^ ^"^\']*)/ims';
        preg_match_all($re_extractImages, $data['descripcion'], $matches);
        $images = $matches[1];
    
        foreach ($images as $image) {
            $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);
            $post->images()->create([
                'image_url' => $image_url,
            ]);
        }
      
        return redirect()->route('admin.solicitudes.index')->with('info', 'Solicitud creada con éxito!');
    }

    public function show($id)
    {
        //session()->flash('flash.banner', 'Solicitud creada con éxito!');
        //session()->flash('flash.bannerStyle', 'success');
    }

    public function edit($post)
    {
        $post = Post::find($post);
        $prioridades = Prioridade::all();
        $servicios = Servicio::all();
        $activos = Activo::all();
        $tipos = Tipo::all();
        $comentarios =  $post->comentarios;
        return view('admin.solicitudes.edit', compact('post', 'prioridades', 'servicios', 'activos', 'tipos', 'comentarios'));
    }

    public function update(Request $request, $post)
    {
        $data =  $request->validate(['titulo' => 'required', 'descripcion' => 'required']);
    
        $post = Post::find($post);
        $post->tipo_id = "2"; //$request->get('tipo');
        $post->titulo = $request->get('titulo');
        $post->prioridad_id = $request->get('prioridad_id');
        $post->servicio_id = $request->get('servicio_id');
        $post->activo_id = $request->get('activo_id');
        $post->sla = $request->get('sla');
        $post->estado_id = "1";
        $post->flujovalor_id = "1";
        $post->user_id = Auth::User()->id;
        $post->activa = true;
        $post->descripcion = $request->get('descripcion');
        $post->update();

        $imagenes_antiguas = $post->images->pluck('image_url')->toArray();
        $re_extractImages = '/src=["\']([^ ^"^\']*)/ims';
        preg_match_all($re_extractImages, $data['descripcion'], $matches);
        $imagenes_nuevas = $matches[1];

        foreach ($imagenes_nuevas as $image) {
            $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);

            $valor = array_search($image_url, $imagenes_antiguas);

            if ($valor === false) {
                $post->images()->create([
                    'image_url' => $image_url,
                ]);
            } else {
                unset($imagenes_antiguas[$valor]);
            }
        }

        foreach ($imagenes_antiguas as $image) {
            Storage::delete($image);
            $post->images()->where('image_url', $image)->delete();
        }

        $mensaje = $request->get('mensaje');
        if ($mensaje !== null) {
            $comentario = new Comentario();
            $comentario->mensaje = $mensaje;
            $comentario->post_id = $post->id;
            $comentario->user_id =  Auth::User()->id;
            $comentario->calificacion = $request->get('calificacion');
            $comentario->save();
            return back();
        } else {
            $post->save();
            return redirect()->route('admin.solicitudes.index')->with('info', 'Solicitud modificada con éxito!');
        }
    }

    public function destroy($post)
    {
        $post = Post::find($post);
        $post->delete();
        return redirect()->route('admin.solicitudes.index')->with('info', 'Solicitud eliminada con éxito!');
    }
}
