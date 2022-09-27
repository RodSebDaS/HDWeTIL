<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DateTimeInterface;
use Carbon\CarbonInterface;
use DateTime;
use DateTimeZone;
use Faker\Provider\DateTime as ProviderDateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class Post extends Model
{
    use HasFactory;
    //use Searchable;
    use SoftDeletes;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $casts = [
        
        //'created_at' => 'datetime:d/m/Y H:i',
        'sla' => 'datetime:d/m/Y H:i',
        'activa' => 'boolean',
       
    ];

    // Relcación uno a muchos

    public function procesos()
    {
        return $this->hasMany(Proceso::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
 
    // Relcación muchos a muchos

    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class, 'detalles');
    }

    // Relcación uno a muchos # Inversa

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

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
    
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function activo()
    {
        return $this->belongsTo(Activo::class);
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

    //Mutadores y accesores

    protected function image():Attribute
    {
        return new Attribute(
          // get: fn() => $this->image_url ?? "http://localhost/storage/images/"
        );
    }
}

