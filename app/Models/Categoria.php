<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Categoria extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];

    // Relcación uno a muchos

    public function activos()
    {
        return $this->hasMany(Activo::class);
    }

    // Relcación uno

    public function tipo()
    {
        return $this->belongsTo(TipoActivo::class);
    }

}
