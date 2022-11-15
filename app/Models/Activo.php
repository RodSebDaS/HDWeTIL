<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Relcación uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function procesosPostsUsers()
    {
       return $this->hasMany(ProcesosPostsUser::class);
    } 
}
