<?php

namespace App\Models;

class Bookings extends Base
{
    protected $table = 'bookings';
    public $primarykey = 'id';
    protected $fillable = [
        'id_equipments',
        'dateFrom',
        'dateTo'
    ];
}
