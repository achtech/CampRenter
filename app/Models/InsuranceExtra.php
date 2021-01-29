<?php

namespace App\Models;

class InsuranceExtra extends Base
{
    protected $table = 'insurance_extra';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
        'nbr_days_from',
        'nbr_days_to',
        'initial_price',
        'price_per_day',
        'sub_extra',
        'created_by',
        'updated_by',
    ];
}
