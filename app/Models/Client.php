<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $guard = 'client';
    protected $table = 'clients';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
        'client_name',
        'client_last_name',
        'email',
        'phone',
        'review',
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
    // public function getAuthPassword()
    // {
    //     return $this->password;
    // }
    // public function getNameAttribute()
    // {
    //     return $this->client_name;
    // }
}
