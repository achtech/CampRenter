<?php

namespace App\Models;

class StatusEquipment extends Base
{
    protected $table = 'status_campers';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr'
    ];
}
