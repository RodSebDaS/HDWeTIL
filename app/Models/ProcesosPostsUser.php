<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role;

class ProcesosPostsUser extends Model
{
    use HasFactory;
    //use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $casts = [
        //'created_at' => 'datetime:d/m/Y H:i',
        'sla' => 'datetime:d/m/Y H:i',
    ];

  
    public function comentario()
    {
        return $this->belongsTo(Comentario::class);
    }

    // Relcación uno a muchos # Inversa

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function prioridad()
    {
        return $this->belongsTo(Prioridade::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function flujovalor()
    {
        return $this->belongsTo(FlujoValore::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
