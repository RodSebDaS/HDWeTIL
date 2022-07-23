<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory;
    //use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }
}
