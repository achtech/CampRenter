<?php

namespace App\Models;

class Client extends Base
{
    protected $table = 'bookingDetails';
    public $primarykey = 'id';
    protected $fillable = [
        'dateFrom',
        'dateTo',
        'bookingDay',
        'equipment_name_en',
        'equipment_name_de',
        'equipment_name_fr',
        'price_per_day',
        'client_name',
        'client_last_name'
    ];
}
