<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role;

class ProcesosImage extends Model
{
    use HasFactory;
    //use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    // Relcación uno a muchos # Inversa

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
