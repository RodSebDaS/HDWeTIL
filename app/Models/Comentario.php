<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\PDO\PostgresDriver;
use OwenIt\Auditing\Contracts\Auditable;

class Comentario extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];

    // Relcación uno a muchos


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ProcesosComentario()
    {
        return $this->hasMany(ProcesosComentario::class);
    }

    public function procesosPostsUser()
    {
        return $this->hasMany(ProcesosPostsUser::class);
    }

}
