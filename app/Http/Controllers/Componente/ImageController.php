<?php

namespace App\Http\Controllers\Componente;

use App\Http\Controllers\Controller;
use App\Models\Image as ModelsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $path = Storage::put('images', $request->file('upload'));
        return [
           'url' => Storage::url($path)
        ];
    }
    
    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'file' => 'required|image'
        ]);
        /* 
        $imagenes = $request->file('file')->store('public/activo');

        $url = Storage::url($imagenes);

        Image::create([
            'image_url' => $url
        ]); 
        */

        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();
        $ruta = storage_path() . '\app\public\activo/' . $nombre;

        Image::make($request->file('file'))
                //Cambiar el tamaño de la imagen a un ancho de 800 y restringir la relación de aspecto (altura automática)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                //Cambiar el tamaño de la imagen a una altura de 800 y restringir la relación de aspecto (ancho automático)
                ->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($ruta);

        ModelsImage::create([
            'image_url' => '/storage/activo/' . $nombre
        ]); 
    }
}
