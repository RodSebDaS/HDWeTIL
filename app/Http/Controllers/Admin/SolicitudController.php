<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Prioridade;
use App\Models\FlujoValore;
use App\Models\Incidencia;
use App\Models\Persona;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Idn;
use Yajra\DataTables\DataTables;

class SolicitudController extends Controller
{
    
    public function index()
    {
        $solicitudes = Incidencia:: with(['Estado:id,nombre','prioridad:id,nombre','flujovalor:id,nombre'])
                                    ->where('estado_id', '=', (Estado::first()->id))
                                    ->get();
                           
        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {  
        $solicitudes = Incidencia:: with(['Estado:id,nombre','prioridad:id,nombre','flujovalor:id,nombre'])
                                    ->where('estado_id', '=', (Estado::first()->id))
                                    ->get();
        return view('admin.solicitudes.create', compact('solicitudes'));
    }
    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
