<?php

namespace App\Models;

class CamperInsurance extends Base
{
    protected $table = 'camper_insurances';
    public $primarykey = 'id';
    protected $fillable = [
        'id_campers',
        'id_insurance_extra',
        'created_by',
        'updated_by',
    ];
}
