<?php

namespace App\Models;

class Client extends Base
{
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
        'updated_by'
    ];
}
