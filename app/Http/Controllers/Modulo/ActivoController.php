<?php

namespace App\Http\Controllers\Modulo;

use App\Http\Controllers\Controller;
use App\Models\Activo;
use App\Models\Area;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Throwable;
use Exception;

class ActivoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:activos.index')->only('index');
        $this->middleware('can:activos.create')->only('create');
        $this->middleware('can:activos.edit')->only('edit');
        $this->middleware('can:activos.store')->only('store');
        $this->middleware('can:activos.show')->only('show');
        $this->middleware('can:activos.update')->only('update');
        $this->middleware('can:activos.destroy')->only('destroy');
    }

    public function index()
    {
        return view('activos.index');
    }

    public function create()
    {
        try {
        } catch (Throwable $e) {
            //return $e->getMessage();
            return back()->withError($e->getMessage())->withInput();
        }
        return view('activos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:100', 'fecha_adquisicion|date' => 'required', 'valor' => 'required', 'categoria_id' => 'required',
            'marca_id' => 'required', 'modelo_id' => 'required', 'estado_id' => 'required', 'area_id' => 'required', 
            'stock' => 'required'
        ]);
        $categoria = Categoria::find($request->categoria_id);
        $categoria_nombre = $categoria->nombre;
        $activo = Activo::create($request->except('persona_id'));
        $activo->categoria_nombre = $categoria_nombre;
        $activo->save();
        $activo->personas()->sync($request->only('activo_id','persona_id'));
        return redirect()->route('activos.index')->with('info', 'Activo creado con éxito!');
    }

    public function show(Activo $activo)
    {
        $activo = Activo::with(['marca:id,nombre', 'modelo:id,nombre', 'personas:id,nombre', 'area:id,nombre', 'estado:id,nombre','categoria:id,nombre,amortizacion,vida_util,cod_prosupuesto'])
        ->where('id','=',$activo->id)
        ->get();
        $activo = $activo[0];
        return view('activos.show', compact('activo'));
    }

    public function edit(Activo $activo)
    {
        return view('activos.edit', compact('activo'));
    }

    public function update(Request $request, $activo)
    {
        //dd($request);
        $request->validate([
            'nombre' => 'required|min:5|max:100', 'fecha_adquisicion|date' => 'required', 'valor' => 'required', 'categoria_id' => 'required',
            'marca_id' => 'required', 'modelo_id' => 'required', 'persona_id' => 'required', 'estado_id' => 'required', 'area_id' => 'required', 
            'stock' => 'required'
        ]);
        $activo = Activo::find($activo);
        $activo->update($request->except('persona_id'));
        $activo->personas()->sync($request->only('activo_id','persona_id'));
        return redirect()->route('activos.index', $activo)->with('info','El activo se modificó correctamente');
    }

    public function destroy(Activo $activo)
    {
        $activo->delete();
        return redirect()->route('activos.index', $activo)->with('info','El activo se eliminó correctamente');
    }
}
