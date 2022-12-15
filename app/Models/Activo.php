<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Activo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
      
    //protected $appends = ['nombre_completo'];
    protected $guarded = [];
 

    // Relcación uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function procesosPostsUsers()
    {
        return $this->hasMany(ProcesosPostsUser::class);
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'proveedor_activos')
            ->withPivot('created_at', 'updated_at');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //Accessors
 
}
