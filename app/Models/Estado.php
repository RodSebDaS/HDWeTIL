<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Estado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];

    // Relcación uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function activos()
    {
        return $this->hasMany(Activo::class);
    }
}
