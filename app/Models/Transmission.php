<?php

namespace App\Models;

class Transmission extends Base
{
    protected $table = 'transmissions';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
