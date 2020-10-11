<?php

namespace App\Models;

class BillingBookings extends Base
{
    protected $table = 'billing_bookings';
    public $primarykey = 'id';
    protected $fillable = [
        'id_billings',
        'id_bookings',
        'created_by',
        'updated_by'
    ];
}
