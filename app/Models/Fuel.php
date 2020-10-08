<?php

namespace App\Models;

class Fuel extends Base
{
    protected $table = 'fuels';
    public $primarykey = 'id';
    protected $fillable = [
        'label_en',
        'label_de',
        'label_fr',
        'created_by',
        'updated_by'
    ];
}
