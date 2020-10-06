<?php

namespace App\Models;

class Insurance extends Base
{
    protected $table = 'insurances';
    public $primarykey = 'id';
    protected $fillable = [
        'id_camper_name',
        'id_inssurance_company',
        'description_en',
        'description_de',
        'description_fr',
        'price_per_day'
    ];
}
