<?php

namespace App\Http\Livewire\Activos;

use App\Models\Activo;
use App\Models\Area;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Persona;
use Livewire\Component;

class FormActivo extends Component
{
    public $activo;
    public $accion = null;
    public $marca;
    public $modelo;
    public $categoria;
    //public $persona;
   //public $adquisicion;

    public function render()
    {
        $activos = Activo::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $marca = $this->marca;
        $modelos = Modelo::where('marca_id', '=', $marca)->get() ;
        $estados = Estado::where('id','>=',9)->get();
        $areas = Area::all();
        $categoria = $this->categoria;
        $category = Categoria::where('id', $categoria)->get();
        $personas = Persona::where('tipo_id',2)->get();
        return view('livewire.activos.form-activo', compact('activos', 'categorias', 'marcas','modelos','estados', 'areas','category','personas'));
    }


}