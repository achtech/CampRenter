<?php

namespace App\Models;

class Insurance extends Base
{
    protected $table = 'insurances';
    public $primarykey = 'id';
    protected $fillable = ['description_en', 'description_de', 'description_fr', 'price_per_day', 'id_insurance_companies', 'id_campers',
        'created_by',
        'updated_by'];
}
