<?php

namespace App\Models;

class Booking extends Base
{
    protected $table = 'bookings';
    public $primarykey = 'id';
    protected $fillable = [
        'start_date',
        'end_date',
        'total',
        'total_camper',
        'total_extras',
        'id_booking_status',
        'status_billings',
        'id_campers',
        'id_clients',
        'commission',
        'created_by',
        'updated_by',
        'comment',
    ];
}
