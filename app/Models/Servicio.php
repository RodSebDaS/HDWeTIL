<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Servicio extends Model implements Auditable
{
    use HasFactory;
    protected $guarded = [];
    use \OwenIt\Auditing\Auditable;

    // Relcación uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function procesosPostsUsers()
    {
        return $this->hasMany(ProcesosPostsUser::class);
    }

    public function puntajes()
    {
        return $this->hasMany(Puntaje::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
