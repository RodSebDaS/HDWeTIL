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
            'nombre' => 'required|min:5|max:100', 'fecha_adquisicion' => 'required', 'valor' => 'required',
            'tipo_id' => 'required|not_in:Seleccione una opción...', 'categoria_id' => 'required|not_in:Seleccione una opción...', 
            'marca_id' => 'required|not_in:Seleccione una opción...', 'modelo_id' => 'required|not_in:Seleccione una opción...', 
            'estado_id' => 'required|not_in:Seleccione una opción...', 'area_id' => 'required|not_in:Seleccione una opción...', 
            'stock' => 'required'
        ]);

        $activo = Activo::create($request->all());
        $categoria = Categoria::find($activo->categoria_id);
        $categoria_nombre = $categoria->nombre;
        $activo->categoria_nombre = $categoria_nombre;
        $activo->save();

        //Imagen
        $re_extractImages = '/src=["\']([^ ^"^\']*)/ims';
        preg_match_all($re_extractImages, $request->get('descripcion'), $matches);
        $images = $matches[1];
        foreach ($images as $image) {
            $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);
            $activo->images()->create([
                'image_url' => $image_url,
            ]);
        }

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
        $request->validate([
            'nombre' => 'required|min:5|max:100', 'fecha_adquisicion' => 'required', 'valor' => 'required',
            'tipo_id' => 'required|not_in:Seleccione una opción...', 'categoria_id' => 'required|not_in:Seleccione una opción...', 
            'marca_id' => 'required|not_in:Seleccione una opción...', 'modelo_id' => 'required|not_in:Seleccione una opción...', 
            'estado_id' => 'required|not_in:Seleccione una opción...', 'area_id' => 'required|not_in:Seleccione una opción...', 
            'stock' => 'required'
        ]);
        $activo = Activo::find($activo)->update($request->all());

        //Imagen
        $re_extractImages = '/src=["\']([^ ^"^\']*)/ims';
        preg_match_all($re_extractImages, $request->get('descripcion'), $matches);
        $images = $matches[1];
        foreach ($images as $image) {
            $image_url = 'images/' . pathinfo($image, PATHINFO_BASENAME);
            $activo->images()->create([
                'image_url' => $image_url,
            ]);
        }
        
        return redirect()->route('activos.index', $activo)->with('info','El activo se modificó correctamente');
    }

    public function destroy(Activo $activo)
    {
        $activo->delete();
        return redirect()->route('activos.index', $activo)->with('info','El activo se eliminó correctamente');
    }
}
