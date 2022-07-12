<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
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
        'name', 'email', 'password',
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
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc(){
        return 'Administrador';
    }

//     public function adminlte_dashboard_url(){
//          return 'home';
//     }

//     public function adminlte_logout_url(){
//         return 'logout';
//     }

//     public function adminlte_login_url(){
//         return 'login';
//     }

//     public function adminlte_register_url(){
//         return 'register';
//     }

//     public function adminlte_password_reset_url(){
//         return 'forgot-password';
//     }

//    public function adminlte_password_email_url(){
//        return 'reset-password';
//    }

   public function adminlte_profile_url(){
    //return 'profile/username';
     return 'user/profile';

}
}