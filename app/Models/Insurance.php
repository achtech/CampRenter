<?php

namespace App\Models;

class Insurance extends Base
{
    protected $table = 'insurances';
    public $primarykey = 'id';
    protected $fillable = ['nbr_days_from', 'nbr_days_to', 'tonage', 'initial_price', 'price_per_day', 'id_camper_categories',
        'created_by',
        'updated_by'];
}
