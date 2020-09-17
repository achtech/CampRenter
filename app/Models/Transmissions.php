<?php

namespace App\Models;

class Transmissions extends Base
{
    protected $table = 'transmissions';
    public $primarykey = 'id';
    protected $fillable = [
        'label'
    ];
}
