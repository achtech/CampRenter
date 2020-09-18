<?php

namespace App\Models;

class EquipmentCategory extends Base
{
    protected $table = 'equipment_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr'
    ];
}
