<?php

namespace App\Models;

class Accessorie extends Base
{
    protected $table = 'camper_accessories';
    public $primarykey = 'id';
    protected $fillable = [
        'id_campers',
        'paid_accessories',
        'booking_per',
        'price'
    ];
}
