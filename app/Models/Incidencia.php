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

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function procesos()
    {
        return $this->hasMany(Proceso::class);
    }

    public function causas()
    {
        return $this->belongsToMany(Causa::class, 'detalle_causa');
    }
}
