<?php

namespace App\Http\Controllers\Modulo;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{

    public function index()
    {
      
        return view('estadisticas.index');
    }

    public function usuarios(Request $request, $id)
    {
        //
    }

    public function posts(Request $request, $id)
    {
        //
    }

}
