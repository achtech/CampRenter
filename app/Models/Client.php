<?php

namespace App\Models;

//use Illuminate\Foundation\Auth\Client as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $guard = 'client';
    protected $table = 'clients';
    public $primarykey = 'id';
    protected $fillable = [
        'client_name',
        'client_last_name',
        'email',
        'password',
        'national_id',
        'image_national_id',
        'driving_licence',
        'driving_licence_image',
        'status',
        'id_avatars',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->passcode;
    }
}
