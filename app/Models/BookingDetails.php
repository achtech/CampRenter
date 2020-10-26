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
        'camper_name_en',
        'camper_name_de',
        'camper_name_fr',
        'price_per_day',
        'client_name',
        'client_last_name',
        'created_by',
        'updated_by',
        'email',
        'password'
    ];
}
