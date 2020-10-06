<?php

namespace App\Models;

class Client extends Base
{
    protected $table = 'clients';
    public $primarykey = 'id';
    protected $fillable = [
        'start_date',
        'end_date',
        'bookingDay',
        'equipment_name_en',
        'equipment_name_de',
        'equipment_name_fr',
        'price_per_day',
        'client_name',
        'client_last_name'
    ];
}
