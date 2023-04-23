<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TipoActivo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];
    // Relcación uno a muchos

    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }

    public function activos()
    {
        return $this->hasMany(Activo::class);
    }
}
