<?php

namespace App\Models;

class Booking extends Base
{
    protected $table = 'bookings';
    public $primarykey = 'id';
    protected $fillable = [
        'id_campers',
        'start_date',
        'end_date'
    ];
}
