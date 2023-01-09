<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use Illuminate\Http\Request;
use App\Models\Auditoria;

class AuditoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:auditorias.index')->only('index');
        $this->middleware('can:auditorias.show')->only('show');
    }

    public function index()
    {
        $auditorias = Audit::all();
        return view('auditoria.index', compact('auditorias'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($auditoria)
    {
        //
    }

    public function edit($auditoria)
    {
        //
    }

    public function update(Request $request, $auditoria)
    {
        //
    }

    public function destroy($auditoria)
    {
        //
    }
}
