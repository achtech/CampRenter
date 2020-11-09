<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class BookingDetail extends Base
{
    protected $table = 'bookings';
    public $primarykey = 'id';
    protected $fillable = [
        'updated_by',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
}
