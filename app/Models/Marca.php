<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Marca extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];

    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }

    public function activos()
    {
        return $this->hasMany(Activo::class);
    }
}
