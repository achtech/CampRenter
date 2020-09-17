<?php

namespace App\Models;

class Renters extends Base
{
    protected $table = 'renters';
    public $primarykey = 'id';
    protected $fillable = [
        'renter_name',
        'renter_last_name',
        'email',
        'password',
        'id_licence_categories',
        'image_licence_categories',
        'national_id',
        'image_national_id',
        'id_avatars'
    ];
}
