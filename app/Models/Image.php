<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_url',
        'post_id',
    ];

    // Relcación uno a muchos # Inversa

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

     // Relcación uno a muchos

     public function procesosImage()
     {
         return $this->hasMany(ProcesosImage::class);
     }
}
