<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proceso extends Model
{
    use HasFactory;
    //use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    // Relcación uno a muchos # Inversa

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
