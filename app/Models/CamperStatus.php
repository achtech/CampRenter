<?php

namespace App\Models;

class CamperStatus extends Base
{
    protected $table = 'camper_status';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr'
    ];
}
