<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'current_rol',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_image(){

        if (Auth::user()->profile_photo_path) {
            return (asset('storage/'.$this->profile_photo_path));
        } else {
            return (asset(Auth::user()->profile_photo_url));
        };
    }

    public function adminlte_desc(){

       return $this->Arr::sort($this->getRoleNames(), SORT_NATURAL | SORT_FLAG_CASE);
    }

    public function adminlte_profile_url(){

        return 'user/profile';
    }

    // Relcación uno a muchos

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function level()
    {
        return $this->belongsTo(Levels::class);
    }
    
    public function ProcesosPostsUsers()
    {
        return $this->hasMany(ProcesosPostsUser::class);
    }

    public function auditorias()
    {
        return $this->hasMany(Audit::class);
    }

     /**
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        // You can add any of the gravatar supported options to this array.
        // See https://gravatar.com/site/implement/images/
        $config = [
            'default' => $this->defaultProfilePhotoUrl(),
            'size' => '200' // use 200px by 200px image
        ];

        return 'https://www.gravatar.com/avatar/'.md5($this->email).'?'.http_build_query($config);
    }

    /**
     * @return string
     */
    public function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/'. implode('/', [

            //IMPORTANT: Do not change this order
            urlencode($this->name), // name
            200, // image size
            'EBF4FF', // background color
            '7F9CF5', // font color
        ]);
    }


    
}