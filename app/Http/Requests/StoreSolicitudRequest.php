<?php

namespace App\Http\Requests;

use App\Models\Post;
use App\Models\Tipo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StoreSolicitudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

       $data = $this->route('solicitudes.store', $_REQUEST);
       $tipo_id =  $data['tipo_id'] ?? null;
       $titulo = $data['titulo'] ?? null;
       $respuesta = Post::select('tipo_id','titulo','flujovalor_id')
                        ->where('tipo_id', $tipo_id)
                        ->where('titulo', $titulo)->latest()->first();
                   
        $flujovalor = $respuesta->flujovalor_id ?? 0;
       //$response = Str::containsAll($respuesta, ['tipo_id' => $tipo_id, 'titulo' => $titulo]);
       
       if ( $respuesta != null && $flujovalor <> 4 ) { //Solicitud Abierta 
            return [
                'titulo' => ['required', 'min:15', 'max:255','unique:posts,titulo'],
                'tipo_id' => ['required', 'unique:posts,tipo_id'],
                'descripcion' => ['required', 'min:15']
            ];
        } elseif ( $respuesta != null && $flujovalor == 4) { //Solicitud Cerrada 
            return [
                'descripcion' => ['required', 'min:15']
            ];
        }else {
            return [
                'titulo' => ['required', 'min:15', 'max:255'],
                 'tipo_id' => ['required'],
                 'descripcion' => ['required', 'min:15']
                //'titulo' => 'unique:posts,titulo,' . $tipo_id . ',null,tipo_id,' . $this->get('tipo_id'),
                //'indice_post' => Rule::unique('posts','indice_post')->
                //    where(fn ($query) => $query->where('flujovalor_id','<>', 4 ))
            ];
        }
    }
}
