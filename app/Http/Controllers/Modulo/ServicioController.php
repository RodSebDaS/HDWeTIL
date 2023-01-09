<?php

namespace App\Http\Controllers\Modulo;

use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Puntaje;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:servicios.index')->only('index');
        $this->middleware('can:servicios.create')->only('create');
        $this->middleware('can:servicios.edit')->only('edit');
        $this->middleware('can:servicios.store')->only('store');
        $this->middleware('can:servicios.show')->only('show');
        $this->middleware('can:servicios.update')->only('update');
        $this->middleware('can:servicios.destroy')->only('destroy');
    }
    
    public function index()
    {
        return view('servicios.index');
    }

    public function create()
    {
        try {
        } catch (Throwable $e) {
            return back()->withError($e->getMessage())->withInput();
        }
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 'valor' => 'required',
        ]);
        $servicio = Servicio::create($request->all());
        return redirect()->route('servicios.index')->with('info', 'Servicio creado con éxito!');
    }

    public function show(Servicio $servicio)
    {
        return view('servicios.show', compact('servicio'));
    }

    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $servicio)
    { 
        $request->validate([
            'nombre' => 'required', 'valor' => 'required',
        ]);
        $servicio = Servicio::find($servicio);
        if ($servicio !== null) {
            $servicio->update($request->all());
          /*   Puntaje::create([
                'post_id' => null,
                'user_id' => Auth::User()->id ?? null,
                'servicio_id' => $servicio->id,
                'calificacion' => $request->get('calificacion'),
                'observacion' => null,
            ]); */
        }
        return redirect()->route('servicios.index', $servicio)->with('info','El servicio se modificó correctamente');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index', $servicio)->with('info','El servicio se eliminó correctamente');
    }
}
