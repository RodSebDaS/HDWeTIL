<?php

namespace App\Http\Livewire\Activos;

use App\Models\Activo;
use App\Models\Area;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Persona;
use App\Models\Tipo;
use App\Models\TipoActivo;
use Database\Seeders\TipoActivoSeeder;
use Livewire\Component;

class FormActivo extends Component
{
    public $activo;
    public $accion = null;
    public $marca;
    public $tipoMarca = "Seleccione una opción...";
    public $modelo;
    public $categoria;
    public $tipo;
    public $tipoActivo = "Seleccione una opción...";
    public $descripcion;
    //public $tipoCategorias;
    //public $persona;
   //public $adquisicion;

    public function render()
    {
        $activos = Activo::all();
        $tipos = TipoActivo::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $areas = Area::all();
        $marca = $this->marca;
        if ($marca != "Seleccione una opción..." && $marca != null) {
            $this->tipoMarca = $marca;
            $modelos = Modelo::where('marca_id', '=', $marca)->get() ;
        }else{
            $this->tipoMarca = $marca;
            $modelos = $modelos;
        }
        $tipo = $this->tipo;
        if ($tipo != "Seleccione una opción..." && $tipo != null) {
            $this->tipoActivo = $tipo;
            $categorias = Categoria::where('tipo_id', $tipo)->get();
        }else{
            $this->tipoActivo = $tipo;
            $categorias = $categorias;
        }
        $estados = Estado::where('id','>=',9)->get();
        $personas = Persona::where('tipo_id',2)->get();
        return view('livewire.activos.form-activo', compact('activos', 'tipos', 'categorias', 'marcas','modelos','estados', 'areas','personas'));
    }
/* 
    public function tipo(){
        //
    }
    public function categoria(){
        //
    }
    public function marca(){
        //
    } */
}