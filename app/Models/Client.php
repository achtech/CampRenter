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
        'id_licence_categories',
        'image_licence_categories',
        'id_avatars',
        'driving_licence_image',
        'driving_licence',
        'type'
    ];
}
