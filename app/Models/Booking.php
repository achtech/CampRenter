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
        'status_booking',
        'status_billings',
        'id_campers',
        'id_clients',
        'id_commissions',
        'id_promotions',
        'created_by',
        'updated_by'
    ];
}
