<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Causa extends Model
{
    use HasFactory;
    //use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function incidencias()
    {
        return $this->belongsToMany(Incidencia::class, 'detalle_causa');
    }
}
