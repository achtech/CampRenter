<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';
    public $primarykey = 'id';
    protected $fillable = [
        'id_equipments',
        'dateFrom',
        'dateTo'
    ];
}
