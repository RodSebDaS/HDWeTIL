<?php

namespace App\Http\Controllers\Modulo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Tipo;


class AccionController extends Controller
{
    public function __construct()
    {
       //
    }

    public function atender(){

        dd("Aaaaaaaaaaa");
        $estado = Estado::find(2);
        $estadoNombre = $estado->nombre;
        $tipo = Tipo::find(2);
        $tipoNombre = $tipo->nombre;
        return view('posts.atender', compact('tipoNombre', 'estadoNombre'));

    }

    public function asignar(){

        dd("Aaaaaaaaaaa");
        $estado = Estado::find(2);
        $estadoNombre = $estado->nombre;
        $tipo = Tipo::find(2);
        $tipoNombre = $tipo->nombre;
        return view('posts.asignar', compact('tipoNombre', 'estadoNombre'));
    }

    public function derivar(){
        //
    }

    public function cerrar(){
        //
    }

    public function rechazar(){
        //
    }

}
