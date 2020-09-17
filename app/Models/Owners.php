<?php

namespace App\Models;

class Owners extends Base
{
    protected $table = 'owners';
    public $primarykey = 'id';
    protected $fillable = [
        'owner_name',
        'owner_last_name',
        'email',
        'password',
        'national_id',
        'image_national_id',
        'id_avatars',
    ];
}
