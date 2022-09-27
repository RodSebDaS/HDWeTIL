<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diagnostico extends Model
{
    use HasFactory;
    //use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    // Relcación muchos a muchos
    
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'detalles');
    }
}
