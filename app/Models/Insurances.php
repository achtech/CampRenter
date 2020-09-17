<?php

namespace App\Models;

class Inssurances extends Base
{
    protected $table = 'inssurances';
    public $primarykey = 'id';
    protected $fillable = [
        'id_camper_name',
        'id_inssurance_company',
        'description',
        'price_per_day'
    ];
}
