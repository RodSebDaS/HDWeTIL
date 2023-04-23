<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;

class ProcesosComentario extends Model
{
    use HasFactory;
    //use Searchable;
   
    protected $guarded = [];

    protected $searchableFields = ['*'];

    // Relcación uno a muchos # Inversa

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function comentario()
    {
        return $this->belongsTo(Comentario::class);
    }

    public function procesosPostsUser()
    {
        return $this->belongsTo(ProcesosPostsUser::class);
    }
    
}
