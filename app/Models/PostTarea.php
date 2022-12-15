<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PostTarea extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }

    public function user_created_at()
    {
        return $this->belongsTo(User::class);
    }

    public function user_updated_at()
    {
        return $this->belongsTo(User::class);
    }

}
