<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Persona extends Model  implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    //use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    // Relcación uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function activos(){
        return $this->belongsToMany(Activo::class,'proveedor_activos')
        ->withPivot('created_at','updated_at');
    }
}
