<?php

namespace App\Models;

class Fuels extends Base
{
    protected $table = 'fuels';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
