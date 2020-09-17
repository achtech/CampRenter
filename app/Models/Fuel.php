<?php

namespace App\Models;

class Fuel extends Base
{
    protected $table = 'fuels';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
