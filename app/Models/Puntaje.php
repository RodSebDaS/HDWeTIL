<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Puntaje extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }
}
