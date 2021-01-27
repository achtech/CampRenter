<?php

namespace App\Models;

class BookingExtra extends Base
{
    protected $table = 'booking_extras';
    public $primarykey = 'id';
    protected $fillable = [
        'id_bookings',
        'id_insurance_extra',
        'price',
        'created_by',
        'updated_by',
    ];
}
