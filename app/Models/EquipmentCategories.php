<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentCategories extends Model
{
    protected $table = 'equipment_categories';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
    ];
}
