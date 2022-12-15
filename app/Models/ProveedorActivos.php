<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ProveedorActivos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use HasFactory;
    protected $guarded = [];

    public function proveedores(){
        return $this->belongsToMany(Persona::class,'proveedor_activos')
        ->withPivot('created_at','updated_at');

    }
    
    public function activos(){
        return $this->belongsToMany(Activo::class,'proveedor_activos')
        ->withPivot('created_at','updated_at');
    }
}
