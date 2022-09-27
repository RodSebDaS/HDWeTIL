<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Estado;
use App\Models\Prioridade;
use App\Models\FlujoValore;

class DatatableController extends Controller
{
    public function solicitud (){
        $solicitudes = Post:: with(['Estado:id,nombre','prioridad:id,nombre','flujovalor:id,nombre'])
                                    ->where('estado_id', '=', (Estado::first()->id), )
                                    ->get();
                                    
        return datatables()->of($solicitudes)
        ->addColumn('btn', 'admin.solicitudes.partials.actions')
        ->rawColumns(['btn'])
        ->toJson();
    }
}
