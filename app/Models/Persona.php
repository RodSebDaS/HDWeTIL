<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory;
    //use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    // Relcación uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
