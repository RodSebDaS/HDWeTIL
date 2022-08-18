<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incidencia extends Model
{
    use HasFactory;
    //use Searchable;
    use SoftDeletes;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $casts = [
        'sla' => 'datetime',
        'activa' => 'boolean',
    ];

    
    // Relcación uno a muchos

    public function procesos()
    {
        return $this->hasMany(Proceso::class);
    }

    // Relcación muchos a muchos

    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class, 'detalles');
    }

    // Relcación uno a muchos # Inversa

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function canal()
    {
        return $this->belongsTo(Canale::class);
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
