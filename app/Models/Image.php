<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Image extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $fillable = [
        'image_url',
        'post_id',
        'activo_id',
    ];

    // Relcación uno a muchos # Inversa

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }

     // Relcación uno a muchos

     public function procesosImage()
     {
         return $this->hasMany(ProcesosImage::class);
     }
}
