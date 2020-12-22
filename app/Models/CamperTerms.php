<?php

namespace App\Models;

class CamperTerms extends Base
{
    protected $table = 'camper_terms';
    public $primarykey = 'id';
    protected $fillable = [
        'id_campers',
        'season',
        'price_per_night',
        'minimum_night',
        'start_month',
        'end_month',
    ];
}
