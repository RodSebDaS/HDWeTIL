<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canale extends Model
{
    use HasFactory;

    // Relcación uno a muchos

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }
}