<?php

namespace App\Models;

class EquipmentCategories extends Base
{
    protected $table = 'equipment_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
